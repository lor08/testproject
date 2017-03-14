<?php

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

Route::get('/', "FrontController@getHome")->name('home');
Route::get('/post/{id}', "FrontController@getPost")->name('post');
Route::post('/post/{post}/comment', "FrontController@addComment")->name('addComment');

Route::get('/admin', "BackendController@getHome")->name('admin');

Route::get('/admin/post/create', "BackendController@createPost")->name('createPost');
Route::get('/admin/post/{post}', "BackendController@getPostForm")->name('postForm');
Route::delete('/admin/post/{post}', "BackendController@deletePost")->name('deletePost');
Route::post('/admin/post/{post?}', "BackendController@updatePost")->name('updatePost');

Route::get('/admin/post/{post}/comments', "BackendController@getComments")->name('adminComments');
Route::get('/admin/comment/{comment}', "BackendController@getCommentForm")->name('getCommentForm');
Route::delete('/admin/comment/{comment}', "BackendController@deleteComment")->name('deleteComment');
Route::post('/admin/comment/{comment?}', "BackendController@updateComment")->name('updateComment');

Route::get('/test', function () {
	$posts = App\Post::all()->pluck("id")->toArray();
	dd($posts);
});

