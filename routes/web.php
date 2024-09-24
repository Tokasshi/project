<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TopicController;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

////////////////////////////////////////...................USERS....................................///////////////////////////////////////////////

Route::prefix('user')->middleware('verified')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('user.index');
    Route::get('/add', [UsersController::class, 'create'])->name('user.add');
    Route::post('/added', [UsersController::class, 'store'])->name('user.store');
    
    Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    Route::put('/{id}/update', [UsersController::class, 'update'])->name('user.update');
});

///////////////////////////////////////..................TESTIMONIALS....................../////////////////////////////////////////////////////
Route::prefix('testim')->middleware('verified')->group(function () {
    Route::get('/', [TestimonialController::class, 'index'])->name('testim.index');
    Route::get('/add', [TestimonialController::class, 'create'])->name('testim.add');
    Route::post('/added', [TestimonialController::class, 'store'])->name('testim.store');
    
    Route::get('/{id}/edit', [TestimonialController::class, 'edit'])->name('testim.edit');
    Route::put('/{id}/update', [TestimonialController::class, 'update'])->name('testim.update');
    Route::delete('/{id}/delete', [TestimonialController::class, 'destroy'])->name('testim.delete');
});

///////////////////////////////////////..........................CATEGORY................................./////////////////////////////////////////////
Route::prefix('cat')->middleware('verified')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('cat.index');
    Route::get('/add', [CategoryController::class, 'create'])->name('cat.add');
    Route::post('/added', [CategoryController::class, 'store'])->name('cat.store');
    
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('cat.edit');
    Route::put('/{id}/update', [CategoryController::class, 'update'])->name('cat.update');
    Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('cat.delete');
});

////////////////////////////........................................TOPICS...............................................////////////////////////////
Route::prefix('topic')->middleware('verified')->group(function () {
    Route::get('/', [TopicController::class, 'index'])->name('topic.index');
    Route::get('/add', [TopicController::class, 'create'])->name('topic.add');
    Route::post('/added', [TopicController::class, 'store'])->name('topic.store');
    Route::get('/{id}/details', [TopicController::class, 'show'])->name('topic.details');

    Route::get('/{id}/edit', [TopicController::class, 'edit'])->name('topic.edit');
    Route::put('/{id}/update', [TopicController::class, 'update'])->name('topic.update');
    Route::delete('/{id}/delete', [TopicController::class, 'destroy'])->name('topic.delete');
});

///////////////////////////.................................MESSAGES......................................//////////////////////////////
Route::prefix('message')->middleware('verified')->group(function () {
    Route::get('/', [MessageController::class, 'index'])->name('msg.index');
    Route::get('/{id}/details', [MessageController::class, 'show'])->name('msg.details');
    Route::delete('/{id}/delete', [MessageController::class, 'destroy'])->name('msg.delete');
});



///////////////////////////////....................................TESTIMONIALS HOME..................................../////////////////////////////////
Route::get('testimonials',[TestimonialController::class,'home'])->name('testimonials.index');
///////////////////////////////.....................................TOPICS POPULAR & TRENDING...................................../////////////////////////////////////
Route::get('popular/topics',[TopicController::class,'listAndLatest'])->name('topics.popular');
////////////////////////////////////////............................TOPICS DETAILS........................./////////////////////////////////
Route::get('topic/{id}/detail', [TopicController::class, 'detail'])->name('topic.detail');
////////////////////////////......................................CONTACT-US........................................////////////////////////////////
Route::get('contact-us',[ContactController::class,'contactForm'])->name('contactForm');
Route::post('contact-us',[ContactController::class,'sendEmail'])->name('sendEmail');
///////////////////////////////////////////...........................INDEX.................................////////////////////////////////
Route::get('index',[IndexController::class,'index'])->name('index');

