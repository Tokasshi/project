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
Route::get('user',[UsersController::class,'index'])->name('user.index');
Route::get('user/add',[UsersController::class,'create'])->name('user.add');
Route::POST('user/added', [UsersController::class, 'store'])->name('user.store');

Route::get('user/{id}/edit',[UsersController::class,'edit'])->name('user.edit');
Route::put('user/{id}/update', [UsersController::class, 'update'])->name('user.update');



///////////////////////////////////////..................TESTIMONIALS....................../////////////////////////////////////////////////////
Route::get('testim',[TestimonialController::class,'index'])->name('testim.index');
Route::get('testim/add',[TestimonialController::class,'create'])->name('testim.add');
Route::POST('testim/added', [TestimonialController::class, 'store'])->name('testim.store');

Route::get('testim/{id}/edit',[TestimonialController::class,'edit'])->name('testim.edit');
Route::put('testim/{id}/update', [TestimonialController::class, 'update'])->name('testim.update');
Route::delete('testim/{id}/delete', [TestimonialController::class, 'destroy'])->name('testim.delete');



///////////////////////////////////////..........................CATEGORY................................./////////////////////////////////////////////
Route::get('cat',[CategoryController::class,'index'])->name('cat.index');
Route::get('cat/add',[CategoryController::class,'create'])->name('cat.add');
Route::POST('cat/added', [CategoryController::class, 'store'])->name('cat.store');

Route::get('cat/{id}/edit',[CategoryController::class,'edit'])->name('cat.edit');
Route::put('cat/{id}/update', [CategoryController::class, 'update'])->name('cat.update');
Route::delete('cat/{id}/delete', [CategoryController::class, 'destroy'])->name('cat.delete');



////////////////////////////........................................TOPICS...............................................////////////////////////////
Route::get('topic',[TopicController::class,'index'])->name('topic.index');
Route::get('topic/add',[TopicController::class,'create'])->name('topic.add');
Route::POST('topic/added', [TopicController::class, 'store'])->name('topic.store');
Route::get('topic/{id}/details', [TopicController::class, 'show'])->name('topic.details');

Route::get('topic/{id}/edit',[TopicController::class,'edit'])->name('topic.edit');
Route::put('topic/{id}/update', [TopicController::class, 'update'])->name('topic.update');
Route::delete('topic/{id}/delete', [TopicController::class, 'destroy'])->name('topic.delete');



///////////////////////////.................................MESSAGES......................................//////////////////////////////
Route::get('message',[MessageController::class,'index'])->name('msg.index');
Route::get('message/{id}/details', [MessageController::class, 'show'])->name('msg.details');
Route::delete('message/{id}/delete', [MessageController::class, 'destroy'])->name('msg.delete');


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

