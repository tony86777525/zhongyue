<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('web')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('web.home');
});

Route::group([
    'namespace' => 'App\Http\Controllers\User',
//    'as' => 'user.',
], function () {

    Route::get('/', [IndexController::class, 'index'])->name('user.top');
//    Route::post('/api/post/store', [PostController::class, 'store'])->name('api.post.store');
//    Route::post('/api/captcha/reload', [CaptchaController::class, 'getCaptchaImageSrc'])->name('api.captcha.reload');
});
