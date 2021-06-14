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
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact/contact');
});
Auth::routes();

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');


Route::resource('wizard', App\Http\Controllers\WizardController::class);

/*
Route::get('/portfolio/{id}', [
    'uses' => 'ProfileController@index'
]);
*/
Route::get('/portfolio/{id}', [App\Http\Controllers\PortfolioController::class, 'index'])->name('portfolio');

Route::get('/wizard/second/{id}', [App\Http\Controllers\WizardController::class, 'colorExtract'])->name('wizardsecond');

