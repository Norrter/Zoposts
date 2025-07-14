<?php


use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminTagController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/contacts', [IndexController::class, 'contacts'])->name('show_contacts');
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');



Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/dashboard', [AdminPostController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{post}', [AdminPostController::class, 'show'])->name('admin.posts.show');
    Route::get('/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');


    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/tags', [AdminTagController::class, 'index'])->name('admin.tag.index');
    Route::get('/tags/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
    Route::post('/tags', [AdminTagController::class, 'store'])->name('admin.tag.store');
    Route::get('/tags/{tag}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
    Route::put('/tags/{tag}', [AdminTagController::class, 'update'])->name('admin.tag.update');
    Route::delete('/tags/{tag}', [AdminTagController::class, 'destroy'])->name('admin.tag.destroy');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

