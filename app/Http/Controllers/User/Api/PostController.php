<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * @param StorePostRequest $request
     */
    public function store(StorePostRequest $request)
    {
        $result = [
            'type' => '0',
            'message' => '發生未知的錯誤,請聯繫我們',
        ];

        $data = $request->validated();

        try {
            $post = new Post();

            $post->name = $data['name'];
            $post->phone = $data['phone'];
            $post->email = $data['email'];
            if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ip_text = $_SERVER['HTTP_X_FORWARDED_FOR'];
                $ip_array = explode(',', $ip_text);
                $ip = $ip_array[0];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $post->ip = $ip;
            $post->url = $data['url'];

            $post->save();

            $postNoticeMailData = getPostNoticeMailData();

            Mail::send('email.post', $post->toArray(), function($message) use ($postNoticeMailData) {
                $message->to($postNoticeMailData['toMail'], $postNoticeMailData['toName'])
                    ->subject($postNoticeMailData['subject']);

                $message->from($postNoticeMailData['fromMail'], $postNoticeMailData['fromName']);
            });

            $result['type'] = '1';
            $result['message'] = '我們已收到您的諮詢';
        } catch (Exception $e) {}

        return response()->json($result);
    }
}
