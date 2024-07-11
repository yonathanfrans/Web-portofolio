<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;


Route::get('/',  [MainController::class, 'index']);

Route::get('/admin', function () {
    return view('admin/login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/admin/editHero', [HeroController::class, 'update']);
Route::post('/admin/createHero', [HeroController::class, 'store']);
Route::delete('/admin/deleteHero', [HeroController::class, 'destroy']);

Route::post('/admin/editAbout', [AboutController::class, 'update']);
Route::post('/admin/createAbout', [AboutController::class, 'store']);
Route::delete('/admin/deleteAbout', [AboutController::class, 'destroy']);


Route::post('/admin/editSkill', [SkillController::class, 'update']);
Route::post('/admin/createSkill', [SkillController::class, 'store']);
Route::delete('/admin/deleteSkill', [SkillController::class, 'destroy']);


Route::post('/admin/editProject', [ProjectController::class, 'update']);
Route::post('/admin/createProject', [ProjectController::class, 'store']);
Route::delete('/admin/deleteProject', [ProjectController::class, 'destroy']);


Route::post('/admin/editContact', [ContactController::class, 'update']);
Route::post('/admin/createContact', [ContactController::class, 'store']);
Route::delete('/admin/deleteContact', [ContactController::class, 'destroy']);


Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

Route::get('/admin/hero', [HeroController::class, 'index'])->middleware('auth');

Route::get('/admin/about', [AboutController::class, 'index'])->middleware('auth');

Route::get('/admin/skill', [SkillController::class, 'index'])->middleware('auth');

Route::get('/admin/project', [ProjectController::class, 'index'])->middleware('auth');

Route::get('/admin/contact', [ContactController::class, 'index'])->middleware('auth');
