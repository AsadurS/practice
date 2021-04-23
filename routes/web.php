<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use  App\Helpers\Oauth;
use App\Http\Controllers\OauthController;
use Illuminate\Http\Request;
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
use App\Http\Controllers\PayorderController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FileUploadController;
use App\Models\User;
use Illuminate\Support\Facades\Http;

Route::get('/', function (Request $request) {
$response = Http::get('http://practice.public/image');
dd($response->body());

});
Route::get('/dd', function (Request $request) {
	 session()->put('userData', ['firstName' => 'asad', 'id' => 'safia']);
 session()->forget('userData');
});



Route::get('/payment', [PayorderController::class, "store"]);

Route::get("/channel", [ChannelController::class, "index"]);
Route::get("/post/create", [PostController::class, "create"]);
Route::post("/post/create", [ FileUploadController::class, "store"])->name('file.store');

Route::get('/image', function()
{
 //return 1;
	  // Store a piece of data in the session...
    //  session()->put('userData', ['firstName' => 'asad', 'id' => 123]);
    //  session()->put('userDatad', ['firstNamed' => 'asadd', 'id' => '12d3']);
 return view('welcome');
 
})->name('dd');


Route::get('/refresh-token', [OauthController::class,'index']);