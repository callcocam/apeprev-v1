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

Route::get('/home',  function(){
    return redirect()->to('/');
})->name('home');

Route::get('/welcome',  function(){
    return redirect()->to('/');
})->name('welcome');

Route::get('/dashboard', function(){
    return redirect()->route('admin.dashboard.index');
})->name('admin.dashboard');

//Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', \App\Http\Livewire\Admin\DashboardComponent::class)->name('dashboard');


\App\ComponentParser::generateRoute(app_path('Http/Livewire/Paginas'));

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function() {
    \UniSharp\LaravelFilemanager\Lfm::routes();
  });