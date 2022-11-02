<?php
use think\facade\Route;

Route::group('base', function(){
    Route::get('index','Base/index');
    Route::post('upload','Base/upload');
    Route::post('uploads','Base/uploads');
    Route::get('routeParam/:name/<age>','Base/routeParam');
    Route::post('routeParam/:name/<age>','Base/routeParam');
    Route::get('routeParam/:name','Base/routeParam');
    Route::post('contentType','Base/contentType');
    Route::get('multipleMethod','Base/multipleMethod');
    Route::post('multipleMethod','Base/multipleMethod');
    Route::put('multipleMethod','Base/multipleMethod');
    Route::post('notParseApi','Base/notParseApi');
})->allowCrossDomain();

Route::group('params', function(){
    Route::get('index','Params/index');
    Route::get('getParams','Params/getParams');
    Route::post('depth','Params/depth');
    Route::post('complex','Params/complex');
    Route::post('tree','Params/tree');
    Route::get('formdata','Params/formdata');
    Route::post('formdata','Params/formdata');
})->allowCrossDomain();


Route::group('debugEvent', function(){
    Route::post('index','DebugEvent/index');
    Route::post('login','DebugEvent/login')->allowCrossDomain();
    Route::post('eventFormToken','DebugEvent/eventFormToken');
    Route::post('eventRef','DebugEvent/eventRef');
    Route::get('eventRef','DebugEvent/eventRef');
})->allowCrossDomain();


Route::group('mock', function(){
    Route::post('index','Mock/index');
})->allowCrossDomain();


Route::group('refs', function(){
    Route::get('definitions','Refs/definitions');
    Route::post('model','Refs/model');
    Route::post('service','Refs/service');
})->allowCrossDomain();

Route::group('mdDesc', function(){
    Route::get('mdDesc','MdDesc/mdDesc');
    Route::get('mdRefDesc','MdDesc/mdRefDesc');
    Route::get('mdDoc','MdDesc/mdDoc');
    Route::get('mdParams','MdDesc/mdParams');
    Route::get('mdApiFieldDesc','MdDesc/mdApiFieldDesc');
    Route::get('refMdApiFieldDesc','MdDesc/refMdApiFieldDesc');
})->allowCrossDomain();


Route::group('test', function(){
    Route::post('getFormToken','Test/getFormToken');
})->allowCrossDomain();

Route::group('userCrud', function(){
    Route::get('list','UserCrud/list');
    Route::get('detail','UserCrud/detail');
    Route::post('add','UserCrud/add');
    Route::put('edit','UserCrud/edit');
    Route::delete('delete','UserCrud/delete');
})->allowCrossDomain();



Route::get('/userRest/list','UserRest/list')->allowCrossDomain();
Route::get('/userRest/<id>','UserRest/detail')->allowCrossDomain();
Route::post('/userRest','UserRest/add')->allowCrossDomain();
Route::put('/userRest','UserRest/edit')->allowCrossDomain();
Route::delete('/userRest/<id>','UserRest/delete')->allowCrossDomain();
Route::get('/user/blog/index','user.Blog/index')->allowCrossDomain();


