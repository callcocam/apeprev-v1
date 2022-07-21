<?php

use Illuminate\Support\Facades\Route;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
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
 
Route::post('/forgot-password', function (Request $request) {
//    dd($request->only('email'));

   $currentUser = null;
   if(\Str::contains($request->email, '@')){      
     $request->validate(['email' => 'required|email']);
     $status = Password::sendResetLink(
        $request->only('email')
    ); 
   }
   else{    
       $request->validate(['email' => 'required']); 
       $instituicao = \App\Models\Instituicao::where('document', $request->email)->first();
       $data['email'] = null;
       if($instituicao){
           $currentUser = \App\Models\User::where('instituicao_id', $instituicao->id)->first();
            if($currentUser){
                $data['email'] = $currentUser->email;
            }
       }
       $status = Password::sendResetLink($data); 
   }
    
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/home',  function(){
    return redirect()->to('/');
})->name('home');

Route::get('/welcome',  function(){
    return redirect()->to('/');
})->name('welcome');

Route::get('/dashboard', function(){
    return redirect()->route('admin.dashboard.index');
})->name('admin.dashboard');

Route::middleware(['auth:sanctum'])->get('/associados/certificado-filiacao/{model}/gerar', function(\App\Models\Instituicao $model){
    return view('prints.certificado-filiacao', compact('model'));
})->name('associados.certificado.emitir');

Route::middleware(['auth:sanctum'])->get('/associados/certificado-filiacao/{model}/recibo', function(\App\Models\Instituicao $model){
    return view('prints.recibo', compact('model'));
})->name('associados.certificado.recibo');

//Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', \App\Http\Livewire\Admin\DashboardComponent::class)->name('dashboard');


\App\ComponentParser::generateRoute(app_path('Http/Livewire/Paginas'));

Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function() {
    \UniSharp\LaravelFilemanager\Lfm::routes();
  });


  
Route::middleware(['auth:sanctum'])->get('/associados/relatorios/cidades', [\App\Http\Controllers\ReportController::class, 'instituicao'])->name('export.instituicao');
