<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\AjaxUploadController;
use App\Http\Controllers\EditorController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts',[PostsController::class,'index']);

Route::get('/posts/create',[PostsController::class,'create']);
Route::post('/posts',[PostsController::class,'store']);

Route::get('/posts{post}/edit',[PostsController::class,'edit']);

Route::resource('products', ProductController::class);

Route::get('/employee', [EmployeeController::class,'index']);




Route::resource('ckeditor',CkeditorController::class);
Route::post('ckeditor/upload',[CkeditorController::class,'upload'])->name('ckeditor.upload');

Route::get('/post',[App\Http\Controllers\HomeController::class,'post'])->name('post');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function (){
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('image-preview', [AjaxUploadController::class, 'index']);
Route::post('upload', [AjaxUploadController::class, 'store']);

Route::resource('editor',EditorController::class);
Route::post('upload',[EditorController::class, 'imageUpload'])->name('editor.imageUpload');

