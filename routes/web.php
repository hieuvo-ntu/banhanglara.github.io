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
    return view('welcome');
});

Route::get('index',[
    'as'=>'index',
    'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getProductType'
]);

Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getProductDetail'
]);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getContact'
]);

Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'PageController@getAbout'
]);

Route::get('dang-ky-1',[
    'as'=>'dangky_1',
    'uses'=>'PageController@getDangKy'
]);

Route::post('dang-ky',[
    'as'=>'dangky',
    'uses'=>'PageController@getSignup'
]);

Route::get('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@postLogin'
]);

Route::get('dang-xuat',[
    'as'=>'dangxuat',
    'uses'=>'PageController@getLogout'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);
