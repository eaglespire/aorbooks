<?php

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
Route::get('/books/login', 'PageController@customLogin')->name('custom-login')->middleware('guest');


Route::get('/books/{book}','HomeController@singleBookAccess')->name('single-book');
Route::get('/my-books', 'PageController@books')->name('my-books')->middleware('access_book_page');
//Route::get('/booksss', 'PageController@books')->name('all-books');

Route::group(['middleware' => ['user']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/change-password', 'PageController@changePassword')->name('change-password');
    Route::post('/change-password', 'PageController@storeNewPassword')->name('store-changed-password');
    Route::resource('/profile','ProfileController');
    Route::resource('/books/{book}/comments','CommentsController');
    Route::get('/download/{file}', 'DownloadsController@download')->name('download');
    Route::get('/search/','SearchController@search')->name('search');
    Route::get('/thank-you-for-signing-up','PageController@thanks')->name('thank-you');
    //Route::get('/thank-you','PageController@thank');
    Route::get('/authors/{author}','PageController@author')->name('single-author');
});


Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/home', 'HomeController@admin')->name('admin');
    Route::resource('/admin/authors','AdminLTE\AuthorController');
    Route::resource('/admin/books','AdminLTE\BookController');
    Route::resource('/admin/users', 'AdminLTE\UsersController');
    Route::resource('/admin/categories', 'AdminLTE\CategoryController');
   // Route::delete('/admin/users/{user}', 'AdminLTE\UsersController@remove')->name('remove_user');
});

/*Route::get('/test', function()
{
    $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.newsletter', [], function($message)
    {
        $message
            ->from('eaglestechspace@gmail.com')
            ->to('whymeandrew@gmail.com', 'John Smith')
            ->subject('Welcome!');
    });

});*/
Route::get('newsletter/send','NewsLetterController@send')->name('send-newsletter');
Route::get('/terms-and-conditions', 'PageController@terms')->name('terms-and-conditions');
Route::get('/privacy-policy','PageController@privacy')->name('privacy-policy');
