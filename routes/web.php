<?php

use App\Livewire\About;
use App\Livewire\Blog;
use App\Livewire\BlogDetail;
use App\Livewire\Contact;
use App\Livewire\Landing;
use App\Livewire\Portfolio;
use Illuminate\Support\Facades\Route;

Route::get('/', Landing::class)->name('landing');
Route::get('/about', About::class)->name('about');
Route::get('/portfolio', Portfolio::class)->name('portfolio');
Route::get('/journal', Blog::class)->name('blog');
Route::get('/journal/{slug}', BlogDetail::class)->name('blog_detail');
Route::get('/contact', Contact::class)->name('contact');
