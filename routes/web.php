<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SendMailUserExample;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-email', function () {
    return view('send-email');
});


Route::post('send-email', function (Illuminate\Http\Request $request) {

    Mail::to($request->email)        
        ->send(new SendMailUserExample([
            'assunto' => $request->assunto,
            'mensagem' => $request->mensagem
        ]));

    return view('send-email-success');

})->name('send-email-post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
