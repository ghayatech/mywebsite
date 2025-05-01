<?php

use App\Http\Controllers\Dashboard\AboutSectionController;
use App\Http\Controllers\Dashboard\HeroSectionController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\StatisticController;
use App\Http\Controllers\Dashboard\TeamSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\ContactController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('website.index');
// });

Route::get('/', [HomeController::class, 'index']);

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');



Route::prefix('admin')->name('dashboard.')->group(function () {
    Route::get('/', fn() => view('dashboard.index'))->name('index');

    // قسم البطل (عرض وتعديل فقط)
    Route::get('/hero', [HeroSectionController::class, 'edit'])->name('hero.index');
    Route::post('/hero', [HeroSectionController::class, 'update'])->name('hero.update');

    // قسم الاحصائيات (عرض وتعديل فقط)
    // Route::get('/statistic', [StatisticController::class, 'edit'])->name('statistics.index');
    // Route::post('/store', [StatisticController::class, 'store'])->name('store');
    // Route::post('/update', [StatisticController::class, 'update'])->name('update');

    Route::resource('services', ServiceController::class)->except('show');

    Route::get('/about', [AboutSectionController::class, 'edit'])->name('about.edit');
    Route::post('/about', [AboutSectionController::class, 'update'])->name('about.update');

    Route::get('/team', [TeamSectionController::class, 'index'])->name('team.index');
    Route::post('/team', [TeamSectionController::class, 'update'])->name('team.update');
    Route::post('/team/member', [TeamSectionController::class, 'storeMember'])->name('team.member.store');
    // Route::get('/team/member/{id}/edit', [TeamSectionController::class, 'editMember'])->name('team.member.edit');
    Route::put('/team/member/{id}', [TeamSectionController::class, 'updateMember'])->name('team.member.update');
    Route::delete('/team/member/{id}', [TeamSectionController::class, 'destroyMember'])->name('team.member.destroy');

    Route::resource('menus', MenuController::class)->except('show');
});


Route::prefix('admin/statistics')->name('dashboard.statistics.')->group(function () {
    Route::get('/', [StatisticController::class, 'index'])->name('index');
    Route::post('/update-section', [StatisticController::class, 'updateSection'])->name('updateSection');

    Route::post('/store', [StatisticController::class, 'store'])->name('store');
    Route::post('/update/{id}', [StatisticController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [StatisticController::class, 'destroy'])->name('destroy');
});
