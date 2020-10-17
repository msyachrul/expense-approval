<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ApprovalSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseExport;
use App\Http\Controllers\ExpensePrint;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('home.index');
    });

    Route::group([
        'prefix' => 'expenses',
        'as' => 'expenses.',
    ], function () {
        Route::get('/{expense}/print', ExpensePrint::class)->name('print');
        Route::get('/export', ExpenseExport::class)->name('export');
    });

    Route::group([
        'prefix' => 'profile',
        'as' => 'profile.'
    ], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'approvals',
        'as' => 'approvals.'
    ], function () {
        Route::get('/', [ApprovalController::class, 'index'])->name('index');
        Route::get('/{approval}', [ApprovalController::class, 'show'])->name('show');
        Route::put('/{approval}', [ApprovalController::class, 'update'])->name('update');
    });

    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'expenses' => ExpenseController::class,
        'approval-settings' => ApprovalSettingController::class,
        'sources' => SourceController::class,
    ]);
});
