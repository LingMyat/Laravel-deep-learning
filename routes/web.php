<?php

use App\Test;
use App\Container;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Test1;
use App\TestFacade;

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
// route::get("/",function(){
//     $container = new Container;
//     $container->bind('test',function(){
//         return new Test();
//     });
//     $test = $container->resolve('test');
//     dd($test->name);
// });

route::get("/",function(){
    // $view = new View();
    // $view->make('welcome');



    dd(app('test1')->testing());

});


route::resource('blog',HomeController::class)->middleware(['auth:sanctum', 'verified']);
route::get('/logout',[AuthController::class , 'logout']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
