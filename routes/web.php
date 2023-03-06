<?php

use App\Http\Livewire\Form;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\SubscriptionForm;
use App\Http\Livewire\SubscriptionFormPreview;
use App\Http\Livewire\SubscriptionRequest;
use App\Http\Livewire\Upload;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', Form::class)->middleware('isLogin');
Route::get('/form', SubscriptionRequest::class)->middleware('isLogin');
Route::get('/register', Register::class)->middleware('notLogin');
Route::get('/login', Login::class)->middleware('notLogin');
