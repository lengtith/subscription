<?php

use App\Http\Controllers\CommentController;
use App\Http\Livewire\Comment;
use App\Http\Livewire\CompleteRegister;
use App\Http\Livewire\CompleteSubscription;
use App\Http\Livewire\CreateSubscription;
use App\Http\Livewire\EditSubscription;
use App\Http\Livewire\Form;
use App\Http\Livewire\FormSubscription;
use App\Http\Livewire\Login;
use App\Http\Livewire\Payment;
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

Route::get('/form/subscription', FormSubscription::class)->middleware('isLogin');
Route::get('/edit/subscription', EditSubscription::class)->middleware('isLogin');
Route::get('/', CreateSubscription::class)->middleware('isLogin');
Route::get('/complete_subscription', CompleteSubscription::class)->middleware('notLogin');
Route::get('/complete_registration', CompleteRegister::class)->middleware('notLogin');
Route::get('/form', Form::class)->middleware('isLogin');
Route::get('/payment', Payment::class)->middleware('isLogin');
Route::get('/register', Register::class)->middleware('notLogin');
Route::get('/login', Login::class)->middleware('notLogin');
Route::get('/comment/{record}', [CommentController::class, 'index'])->name('comment');
Route::view('/subscription_id/{record}', 'subscription-id-form')->name('subscription-id');
Route::view('/pdf/{record}', 'pdf')->name('pdf');
