<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes([
	'reset' => false,
	'confirm' => false,
	'verify' => false,
]);

Route::group(['middleware' => 'web'], function() {

	Route::get('/', ['uses' => 'IndexController@show', 'as' => 'home']);

	Route::get('/categories/{category}', ['uses' => 'CategoriesController@show', 'as' => 'categories'])->where('category', '^([0-9]+)$');

	Route::get('/articles', ['uses' => 'ArticlesController@show', 'as' => 'articles']);
	Route::match(['get', 'post'], '/article/{article}', ['uses' => 'ArticleController@show', 'as' => 'article'])->where('article', '^([0-9]+)$');

	Route::get('/portfolios', ['uses' => 'PortfoliosController@show', 'as' => 'portfolios']);
	Route::get('/portfolio/{portfolio}', ['uses' => 'PortfolioController@show', 'as' => 'portfolio'])->where('portfolio', '^([0-9]+)$');

	Route::match(['get', 'post'], '/contacts', ['uses' => 'ContactController@show', 'as' => 'contacts']);

	Route::get('/profile/{user}', ['uses' => 'ProfileController@show', 'as' => 'profile']);

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function() {

	Route::get('/', ['uses' => 'AdminController@show', 'as' => 'admin']);

	Route::group(['prefix' => 'slider'], function() {

		Route::get('/', ['uses' => 'SliderController@show', 'as' => 'slider']);

		Route::match(['get', 'post'], '/add', ['uses' => 'SliderAddController@show', 'as' => 'slider_add']);
		Route::match(['get', 'post', 'delete'], '/edit/{slider}', ['uses' => 'SliderEditController@execute', 'as' => 'slider_edit']);

	});

	Route::group(['prefix' => 'blog'], function() {

		Route::get('/', ['uses' => 'BlogController@show', 'as' => 'blog']);

		Route::match(['get', 'post'], '/add', ['uses' => 'BlogAddController@show', 'as' => 'blog_add']);
		Route::match(['get', 'post', 'delete'], '/edit/{article}', ['uses' => 'BlogEditController@execute', 'as' => 'blog_edit']);

	});

	Route::group(['prefix' => 'portfolios'], function() {

		Route::get('/', ['uses' => 'AdminPortfoliosController@show', 'as' => 'admin_portfolios']);

		Route::match(['get', 'post'], '/add', ['uses' => 'PortfolioAdd@execute', 'as' => 'portfolio_add']);
		Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses' => 'PortfolioEditController@execute', 'as' => 'portfolio_edit']);

	});

	Route::group(['prefix' => 'comments'], function() {

		Route::get('/', ['uses' => 'CommentsController@show', 'as' => 'comments']);

		Route::delete('/edit/{comment}', ['uses' => 'CommentEditController@execute', 'as' => 'comment_edit']);

	});

	Route::group(['prefix' => 'categories'], function() {

		Route::get('/', ['uses' => 'AdminCategoriesController@show', 'as' => 'admin_categories']);

		Route::match(['get', 'post'], '/add', ['uses' => 'CategoryAddController@execute', 'as' => 'category_add']);
		Route::match(['get', 'post', 'delete'], '/edit/{category}', ['uses' => 'CategoryEditController@execute', 'as' => 'category_edit']);

	});

	Route::group(['prefix' => 'filters'], function() {

		Route::get('/', ['uses' => 'FiltersController@show', 'as' => 'filters']);

		Route::match(['get', 'post'], '/add', ['uses' => 'FilterAddController@execute', 'as' => 'filter_add']);
		Route::match(['get', 'post', 'delete'], '/edit/{filter}', ['uses' => 'FilterEditController@execute', 'as' => 'filter_edit']);

	});

	Route::group(['prefix' => 'skills'], function() {

		Route::get('/', ['uses' => 'SkillsController@show', 'as' => 'skills']);

		Route::match(['get', 'post'], '/add', ['uses' => 'SkillAddController@execute', 'as' => 'skill_add']);
		Route::match(['get', 'post', 'delete'], '/edit/{skill}', ['uses' => 'SkillEditController@execute', 'as' => 'skill_edit']);

	});

	Route::group(['prefix' => 'menu'], function() {

		Route::get('/', ['uses' => 'MenuController@show', 'as' => 'menu']);

		Route::match(['get', 'post'], '/add', ['uses' => 'MenuAddController@execute', 'as' => 'menu_add']);
		Route::match(['get', 'post', 'delete'], '/edit/{menu}', ['uses' => 'MenuEditController@execute', 'as' => 'menu_edit']);

	});

	Route::group(['prefix' => 'users'], function() {

		Route::get('/', ['uses' => 'UsersController@show', 'as' => 'users']);
		Route::get('/{user}', ['uses' => 'UserController@show', 'as' => 'user']);

		Route::match(['get', 'post'], '/edit/{user}', ['uses' => 'UserEditController@execute', 'as' => 'user_edit']);

	});

});