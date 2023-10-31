<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Integration\EmailController;
use App\Http\Controllers\Integration\TelegramController;
use App\Http\Controllers\Integration\CrmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/post', [FormController::class, 'submit'])->name('submitForm');

Route::middleware('auth')->group(function (){
    Route::get('/in.xxx.crm', [AdminController::class, 'index'])->name('adminHome');
    Route::get('/in.xxx.crm.logout', [AuthController::class, 'logout'])->name('adminLogout');
    Route::get('/in.xxx.crm/emailsetting', [EmailController::class, 'show'])->name('showEmailSetting');
    Route::post('/in.xxx.crm/emailsetting/save', [EmailController::class, 'update'])->name('emailUpdateSetting');
    Route::get('/in.xxx.crm/telegramsetting', [TelegramController::class, 'show'])->name('showTelegramSetting');
    Route::post('/in.xxx.crm/telegramsettin/save', [TelegramController::class, 'update'])->name('telegramUpdateSetting');
    Route::get('/in.xxx.crm/crmsetting', [CrmController::class, 'show'])->name('showCrmSetting');
    Route::post('/in.xxx.crm/crmsetting/save', [CrmController::class, 'update'])->name('crmUpdateSetting');
});

Route::middleware('guest')->group(function (){
    Route::get('/admin', [AuthController::class, 'index'])->name('adminLogin');
    Route::post('/admin_process', [AuthController::class, 'login'])->name('loginProcess');
});




