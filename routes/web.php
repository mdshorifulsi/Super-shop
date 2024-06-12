<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();



Route::get('/{vue_capture?}',function(){

    return view('admin_layouts');
})->where('vue_capture','[\/\w\.-]*');