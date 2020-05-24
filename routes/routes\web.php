<?php
/*
|--------------------------------------------------------------------------
| routes/web.php *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

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
    return view('frontend.index');  /* Lecture 5 */
});



Route::get('/object','FrontendController@object')->name('object'); /* Lecture 5 */
Route::get('/adminHome','FrontendController@adminHome')->name('adminHome'); /* Lecture 5 */
Route::get('/roomSearch','FrontendController@roomSearch')->name('roomSearch'); /* Lecture 5 */
