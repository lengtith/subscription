<?php

use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Pages\Subscription\Create;
use App\Http\Livewire\Pages\Subscription\Edit;
use App\Http\Livewire\Pages\Subscription\Approve;
use App\Http\Livewire\Pages\Subscription\Preview;
use App\Http\Livewire\Pages\AdminPdfPreview;
use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\ThankRegistration;
use App\Http\Livewire\Pages\ThankSubscription;
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

Route::get('/{id}/preview', Preview::class)->name('form.preview');
Route::get('/{id}/pdf', AdminPdfPreview::class)->name('pdf.preview');

Route::group(['middleware' => ['notLogin']], function () {
    Route::get('/register', Register::class);
    Route::get('/login', Login::class);
    Route::get('/complete_registration', ThankRegistration::class);
});

Route::group(['middleware' => ['isLogin']], function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/create', Create::class)->name('create');
    Route::get('/{id}/edit', Edit::class)->name('subscription.edit');
    Route::get('/form', Approve::class);
    Route::get('/complete_subscription', ThankSubscription::class);
});
