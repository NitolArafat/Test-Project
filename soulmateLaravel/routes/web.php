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

Route::get('/', function () {
   // return view('welcome');
    return view('front-end.login');
});

Route::get('person_detail/{request_id}/{response_id}',[
    'uses'=>'HomeController@persionDetals',
    'as'=>'person-detail'
            
]);


Route::post('like-person/',[
    'uses'=>'LikeController@likePerson',
    'as'=>'like-person'
            
]);


Route::post('dislike-person/',[
    'uses'=>'LikeController@dislikePerson',
    'as'=>'dislike-person'
            
]);

//Route::get('/person-detail/(id)', 'PersionDetailsController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


