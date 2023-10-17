<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Manajemen\FeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\Manajemen\UserController;
use App\Http\Controllers\Manajemen\ContentController;

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

 Auth::routes([
     'register' => false
 ]);

Route::get('/', [LandingPageController::class, 'beranda'])->name('beranda');
Route::post('feedback/store', [LandingPageController::class, 'feedback'])->name('feedback.store');
Route::get('monitoring', [LandingPageController::class, 'monitoring'])->name('monitoring');

// Charts
Route::get('chart-data-ph', [ChartController::class, 'getChartDataPh'])->name('get-chart-data-ph');
Route::get('chart-data-temp', [ChartController::class, 'getChartDataTemp'])->name('get-chart-data-temp');
Route::get('chart-data-tds', [ChartController::class, 'getChartDataTds'])->name('get-chart-data-tds');
Route::get('chart-data-turbidity', [ChartController::class, 'getChartDataTurbidity'])->name('get-chart-data-turbidity');

// Logs
Route::prefix('logs/data')->name('logs.data.')->group(function () {

    Route::get('fetch', [PageController::class, 'fetchData'])->name('fetch');
    Route::get('fetch/last', [PageController::class, 'fetchLastData'])->name('fetch.last');

});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    // Logs
    Route::prefix('logs/data')->name('logs.data.')->group(function () {

        // PH
        Route::get('ph', [LogsController::class, 'ph'])->name('ph');

        // Temperature
        Route::get('temperature', [LogsController::class, 'temperature'])->name('temperature');

        // TDS
        Route::get('tds', [LogsController::class, 'tds'])->name('tds');

        // Turbidity
        Route::get('turbidity', [LogsController::class, 'turbidity'])->name('turbidity');

        Route::post('ajax', [LogsController::class, 'dataSensorAjax'])->name('ajax');
    });

    // Manajemen
    Route::prefix('manajemen')->name('manajemen.')->group(function () {

        // Feedback
        Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback');
        Route::delete('feedback/delete/{id}', [FeedbackController::class, 'destroy'])->name('feedback.delete');

        // User
        Route::get('user', [UserController::class, 'index'])->name('user');

        // Content
        Route::get('content', [ContentController::class, 'index'])->name('content');
    });

 });
