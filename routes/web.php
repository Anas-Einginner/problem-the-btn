<?php

use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Teacher\TeachersController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//url : learnschool/dashboard/grades
// name : dash.grade.index
Route::prefix('learnschool/')->group(function () {
    Route::prefix('dashboard/')->name('dash.')->group(function () {

        Route::prefix('grades/')->controller(GradeController::class)->name('grade.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/getdata', 'getdata')->name('getdata');
            Route::get('/getactive', 'getactive')->name('getactive');
            Route::get('/getactivesection', 'getactivesection')->name('getactive.section');
            Route::get('/getactivestage', 'getactivestage')->name('getactive.stage');
            Route::get('/create', 'create')->name('create');
            Route::post('/add', 'add')->name('add');
            Route::post('/changemaster', 'changemaster')->name('changemaster');
            Route::post('/addsection', 'addsection')->name('addsection');
        });
    

        
        Route::prefix('section/')->controller(SectionController::class)->name('sections.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/getdata', 'getdata')->name('getdata');
            Route::post('/add', 'add')->name('add');
            Route::post('/changestatus', 'changestatus')->name('changestatus');
        }); 
        Route::prefix('teacher/')->controller(TeachersController::class)->name('teacher.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/getdata', 'getdata')->name('getdata');
            Route::post('/add', 'add')->name('add');
            Route::post('/update', 'update')->name('update');
            Route::post('/delete', 'delete')->name('delete');
        });

    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';