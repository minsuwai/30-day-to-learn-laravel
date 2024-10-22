<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('test', function () {
    \Illuminate\Support\Facades\Mail::to('minsuwai.dev@gmail.com')->send(
        new JobPosted()
    );

    return 'success';
});

Route::view('/', 'home');

Route::get('/about', function () {
    return view('about');
});

Route::view('/contact', 'contact');

Route::get('jobs', [JobController::class, 'index']);
Route::get('jobs/create', [JobController::class, 'create']);
Route::post('jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('jobs/{job}', [JobController::class, 'show']);

Route::get('jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::delete('jobs/{job}', [JobController::class, 'destory']);


//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destory']);



























// Route::get('/contact', function () {
//     return view('contact');
// });


// index
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs',  'index');
//     Route::get('/jobs/create',  'create');
//     Route::post('/jobs',  'store');
//     Route::get('/jobs/{job}',  'show');
//     Route::get('/jobs/{job}/edit',  'edit');
//     Route::patch('/jobs/{job}',  'update');
//     Route::delete('/jobs/{job}',  'destory');
// });
