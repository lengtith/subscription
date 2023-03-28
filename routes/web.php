<?php

use App\Http\Livewire\AdminPdfPreview;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Pages\Subscription\Create;
use App\Http\Livewire\Pages\Subscription\Edit;
use App\Http\Livewire\Pages\Subscription\Approve;
use App\Http\Livewire\Pages\Subscription\Preview;
use App\Http\Livewire\Home;
use App\Http\Livewire\ThankRegistration;
use App\Http\Livewire\ThankSubscription;
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

Route::get('/register', Register::class)->middleware('notLogin');
Route::get('/login', Login::class)->middleware('notLogin');

Route::get('/complete_subscription', ThankSubscription::class)->middleware('isLogin');
Route::get('/complete_registration', ThankRegistration::class)->middleware('notLogin');

Route::get('/', Home::class)->middleware('isLogin')->name('home');
Route::get('/create', Create::class)->name('create')->middleware('isLogin');
Route::get('/edit/{id}', Edit::class)->name('subscription.edit')->middleware('isLogin');
Route::get('/form', Approve::class)->middleware('isLogin');
Route::get('/preview/{id}', Preview::class)->name('form.preview');
Route::get('/pdf/{id}', AdminPdfPreview::class)->name('pdf.preview');

