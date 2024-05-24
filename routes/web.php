<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TechnologiesController;
use App\Http\Controllers\TypesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PageController::class,'index'])->name('home');

Route::middleware(['auth','verified'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function(){
            // qui vengono inserite tutte le rotte delle crud e tutte quelle protette da auth
            Route::get('/',[DashboardController::class ,'index'])->name('home ');
            Route::resource('projects', ProjectsController::class);
            Route::resource('technology',TechnologiesController::class);
            Route::resource('type',TypesController::class);
            Route::get('technology-projects',[TechnologiesController::class,'technologyProjects'])->name('technology_projects');
        });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
