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

Route::get('about',function(){
    return view('about');
});


Route::get('/hello',function(){
    $dataArray = [
        'message' => 'alamat yang anda cari tidak ditemukan'
    ];

    return response()->json($dataArray);
});



Route::get('/debug',function(){
 $dataArray = [
    'message' => 'hello, word'
 ];

 ddd($dataArray);

});


$taskList = [
    // 'first' => 'belajar Laravel',
    // 'second'=> 'membuat aplikasi',
    // 'third' => 'mempelajari php',
    // 'fourty' => 'menyimpan data base',
    'nama' => 'winda widodo',
    'alamat' => 'bekasi',
    'tempat tinggal' => 'cibitung',
    'jurusan' => 'Teknik Informatika',
    'Nomor telp' => '089662775429'
];




//Routing task

// mencari data melalui search
Route::get('/task',function()  use ($taskList){
 if (request()->search){
    return $taskList[request()->search];
 }
    return $taskList;
});

// mencari data melalui parameter
Route::get('/task/{param}',function($param)  use ($taskList){
 return $taskList[$param];
});


//menambahkan data
Route::post('/task', function() use ($taskList){
    $taskList[request()->Universitas] = request()->MataKuliah;

});