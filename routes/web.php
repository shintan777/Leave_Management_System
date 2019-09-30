<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::group(['middleware' => 'auth'], function (){

    Route::get('dashboard',              [ 'as'=>'dashboard',            'uses' => 'DashboardController@index']);
    Route::post('change',              [ 'as'=>'change',            'uses' => 'ResetController@change']);
    Route::post('changesem',              [ 'as'=>'changesem',            'uses' => 'ResetController@changesem']);

    Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
    Route::get('user/create',            [ 'as'=>'user.create',          'uses' => 'UserController@create']);
    Route::post('user/store',            [ 'as'=>'user.store',           'uses' => 'UserController@store']);
    Route::get('user/view/{id}',         [ 'as'=>'user.view',            'uses' => 'UserController@view']);
    Route::get('user/edit/{id}',         [ 'as'=>'user.edit',            'uses' => 'UserController@edit']);
    Route::post('user/update/{id}',      [ 'as'=>'user.update',          'uses' => 'UserController@update']);
    Route::get('user/delete/{id}',       [ 'as'=>'user.delete',          'uses' => 'UserController@delete']);
    Route::get('user/search',       [ 'as'=>'user.search',      'uses' => 'UserController@search']);
    Route::get('/latecnt/{id}',               [ 'as'=>'latecnt',              'uses' => 'LeaveController@latecnt']);
    Route::get('/deductcl/{id}',               [ 'as'=>'deductcl',              'uses' => 'LeaveController@deductcl']);
    
    Route::get('leave',               [ 'as'=>'leave',              'uses' => 'LeaveController@index']);
    Route::get('leave/create',        [ 'as'=>'leave.create',       'uses' => 'LeaveController@create']);
    Route::post('leave/store',        [ 'as'=>'leave.store',        'uses' => 'LeaveController@store']);
    Route::get('leave/search',        [ 'as'=>'leave.search',       'uses' => 'LeaveController@search']);
    Route::get('leave/edit/{id}',     [ 'as'=>'leave.edit',         'uses' => 'LeaveController@edit']);
    Route::post('leave/update/{id}',  [ 'as'=>'leave.update',       'uses' => 'LeaveController@update']);
    Route::get('leave/delete/{id}',       [ 'as'=>'leave.delete',          'uses' => 'LeaveController@delete']);

    //Route::put('/leave/edit/{id}', 'LeaveController@update');

//    Route::get('leave/delete/{id}',   [ 'as'=>'leave.delete',       'uses' => 'LeaveController@delete']);
    Route::post('leave/approve/{id}',        [ 'as'=>'leave.approve',        'uses' => 'LeaveController@approve']);
    Route::post('leave/remark/{id}',        [ 'as'=>'leave.remark',        'uses' => 'LeaveController@remark']);

    Route::post('leave/libapprove/{id}',        [ 'as'=>'leave.status',        'uses' => 'LeaveController@status']);

    Route::post('leave/paid/{id}',        [ 'as'=>'leave.paid',        'uses' => 'LeaveController@paid']);
//    Route::post('leave/pending/{id}',        [ 'as'=>'leave.pending',        'uses' => 'LeaveController@pending']);
//    Route::post('leave/reject/{id}',        [ 'as'=>'leave.reject',        'uses' => 'LeaveController@reject']);

   
    Route::get('event', ['as'=>'event', 'uses' => 'EventController@event']);
    Route::post('event/store', ['as'=>'event.store', 'uses' => 'EventController@store']);

    Route::get('calendar',['as'=>'calendar', 'uses' => 'CalendarController@index']);
    Route::get('calendar/add',['as'=>'calendar.add', 'uses' =>'CalendarController@add']);
    Route::post('calendar/store',['as'=>'calendar.store', 'uses' =>'CalendarController@store']);

    Route::get('profile',                   [ 'as'=>'profile',                   'uses' => 'ProfileController@index']);
    Route::get('change-password',           [ 'as'=>'change.password',           'uses' => 'ProfileController@changePassword']);
    Route::get('reset',                   [ 'as'=>'reset',                   'uses' => 'ResetController@index']);
    Route::match(['get','match'],        'update-password',           [ 'as'=>'update.password',           'uses' => 'ProfileController@updatePassword']);

    Route::get('downloads',                 [ 'as'=>'download',                   'uses' => 'DownloadController@index']);

});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




