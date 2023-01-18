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
            $post->ip = $request->ip();
            $post->url = $data['url'];

            $post->save();

            $to_name = 'dc1';
            $to_email = 'tony86777525@gmail.com';
            Mail::send('email.post', $post->toArray(), function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Laravel Test Mail');
                $message->from('tony86777525@gmail.com', 'Test Mail');
            });

            $result['type'] = '1';
            $result['message'] = '我們已收到您的諮詢';
        } catch (Exception $e) {}

        return response()->json($result);
    }
}
