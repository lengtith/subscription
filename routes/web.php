<?php


use App\Http\Livewire\CompleteRegister;
use App\Http\Livewire\CompleteSubscription;
use App\Http\Livewire\Components\Subscription\Approve;
use App\Http\Livewire\Components\Subscription\Create;
use App\Http\Livewire\Components\Subscription\Edit;
use App\Http\Livewire\Components\Subscription\Preview;
use App\Http\Livewire\Index;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
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

Route::get('/complete_subscription', CompleteSubscription::class)->middleware('isLogin');
Route::get('/complete_registration', CompleteRegister::class)->middleware('notLogin');

Route::get('/register', Register::class)->middleware('notLogin');
Route::get('/login', Login::class)->middleware('notLogin');
Route::get('/', Index::class)->middleware('isLogin');
Route::get('/create', Create::class)->name('create')->middleware('isLogin');
Route::get('/edit/{id}', Edit::class)->name('subscription.edit')->middleware('isLogin');
Route::get('/form', Approve::class)->middleware('isLogin');
Route::get('/preview', Preview::class)->name('preview')->middleware('isLogin');
Route::get('/pdf/{id}', Preview::class)->name('pdf.download');
