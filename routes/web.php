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
Route::get('/', [
	'uses' => 'ArticleController@index',
	'as'   => 'home'
]);
Route::get('articles/index', ['uses' => 'ArticleController@index', 'as' => 'articles.index']);

Route::get('/scraping', 'ScrappingController@reading');


Route::get('logout', 'ArticleController@index')->name('logout');

Auth::routes();

Route::get('/', 'ArticleController@index')->name('home');

	Route::post('cart/store', ['uses'=>'CartController@store', 'as'=>'cart.store']);
	Route::get('cart/show/{id}', ['uses'=> 'CartController@show', 'as'=>'cart.show']);
	Route::get('cart/destroy/{id}',['uses' => 'CartController@destroy', 'as' =>'cart.destroy']);
	Route::get('cart/edit/{id}',['uses' => 'CartController@edit', 'as' =>'cart.edit']);
	Route::post('cart/viewItem', ['uses'=>'CartController@viewItem', 'as'=>'cart.viewItem']);
	Route::get('cart/friend/{id}', ['uses'=> 'CartController@friends', 'as'=>'cart.friends']);

	Route::get('friend/show/{id}', ['uses'=> 'FriendController@show', 'as'=>'friend.show']);
	Route::get('friend', ['uses'=> 'FriendController@index', 'as'=>'friend']);
	Route::get('cart/showFriend/{id}', ['uses'=> 'CartController@showFriend', 'as'=>'cart.showFriend']);
	Route::get('article/addMycart/{id}', ['uses' => 'CartController@storeArticle', 'as' => 'article.addMycart']);
	
	Route::get('index', ['uses' => 'FriendController@index', 'as'   => 'users.index']);
	Route::get('user/destroy/{id}', ['uses' => 'FriendController@destroy', 'as' => 'user.destroy']);
