<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\Frontend\TaskController;


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
    return view('text',[
        'name' => 'Trần Đình NGhĩa',
        'date' => '13/10/2001',
        'school' => 'HVNN',
        'home' => 'Bắc Ninh',
        'target' => 'Developer fe + be',
    ]);
});


Route::prefix('task')->group(function () {
    Route::get('/', [TaskController::class , 'index'])->name('task.index');

    Route::get('/destroy/{task}' ,
                    [TaskController::class , 'destroy'])->name('task.destroy');

    Route::get('/edit/{task}' ,
                [TaskController::class , 'edit'])->name('task.edit');
    
    Route::get('/create' ,
                [TaskController::class , 'create'])->name('task.create');
    
    Route::get('/show/{task}' ,
                [TaskController::class , 'show'])->name('task.show');

    Route::post('/store' ,
                [TaskController::class , 'store'])->name('task.store');

    Route::get('/complete/{task}' ,
                [TaskController::class , 'complete'])->name('task.complete');
                
    Route::get('/recomplete/{task}' ,
                [TaskController::class , 'recomplete'])->name('task.recomplete');
            

    
    
});

// Route::get('/hello1',function(){
//     //  $list = [
//     //     [
//     //         'name' => 'Học View trong Laravel',
//     //         'status' => 0
//     //     ],
//     //     [
//     //         'name' => 'Học Route trong Laravel',
//     //         'status' => 1
//     //     ],
//     //     [
//     //         'name' => 'Làm bài tập View trong Laravel',
//     //         'status' => -1
//     //     ],
//     // ];

//     // $list = ['thời sự','quốc tế'];
//     return view('hello1');
// });

Route::get('/master',function(){
    return view('home' ,[
        'name'=>'Son Tung',
    ]);
});


Route::prefix('tasks')->group(function () {
    Route::get('/', function () {
     return view('tasks.index');
    });
    Route::get('/edit/{id}',
        [HomeController::class, 'edit']
    );

    Route::delete('/delete/{id}', 
                [HomeController::class, 'destroy']
    )->name('tasks.delete');
});

// Luyen tap controller
// Route::get('/hallo',
//     [HomeController::class, 'hallo']
// );

//CRUD

// //End luyen tap



// Route::post('/create', function () {
//     // return view('welcome');
//     echo "Creat Tasks";
// });

// Route::get('/user/{id}/post/{post}', function($id, $idPost) {
//     return "This is post $idPost of user $id"; 
// });
