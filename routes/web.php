<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. KHAI BÁO CONTROLLER CHO NGƯỜI DÙNG (CLIENT)
use App\Http\Controllers\PostController as ClientPostController;
use App\Http\Controllers\ServiceController as ClientServiceController;
use App\Http\Controllers\ProjectController as ClientProjectController;
use App\Http\Controllers\CertificateController as ClientCertificateController;
use App\Http\Controllers\ContactController as ClientContactController;

// 2. KHAI BÁO CONTROLLER CHO QUẢN TRỊ (ADMIN)
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use App\Models\Post;
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| ROUTES CHO QUẢN TRỊ (ADMIN) - ĐƯA LÊN ĐẦU ĐỂ ƯU TIÊN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD Tài nguyên cho Admin
    Route::resource('services', AdminServiceController::class);
    Route::resource('posts', AdminPostController::class);
    Route::resource('projects', AdminProjectController::class);
    Route::resource('certificates', AdminCertificateController::class);

    Route::resource('contacts', AdminContactController::class)->only(['index', 'destroy']);
    Route::post('/contacts/{id}/status', [AdminContactController::class, 'updateStatus'])->name('contacts.updateStatus');
});

/*
|--------------------------------------------------------------------------
| ROUTES CHO NGƯỜI DÙNG (CLIENT)
|--------------------------------------------------------------------------
*/

// Trang chủ
Route::get('/', function () {
    $latestPosts = Post::query()->orderByDesc('created_at')->limit(3)->get();
    $servicesHome = Service::query()->where('status', 'published')->orderBy('sort_order')->limit(3)->get();
    return view('home', compact('latestPosts', 'servicesHome'));
})->name('home');

// Dịch vụ của User (Đổi tên name thành client.services để tránh trùng)
Route::get('/dich-vu', [ClientServiceController::class, 'index'])->name('client.services.index');
Route::get('/dich-vu/{slug}', [ClientServiceController::class, 'show'])->name('client.services.show');

// Tin tức (Đổi tên name thành client.posts để đồng bộ)
Route::get('/tin-tuc', [ClientPostController::class, 'index'])->name('client.posts.index');
Route::get('/tin-tuc/{slug}', [ClientPostController::class, 'show'])->name('client.posts.show');

// Các trang khác
Route::get('/du-an', [ClientProjectController::class, 'index'])->name('client.projects.index');
Route::get('/du-an/{slug}', [ClientProjectController::class, 'show'])->name('client.projects.show');
Route::get('/chung-chi', [ClientCertificateController::class, 'index'])->name('client.certificates.index');
Route::get('/lien-he', [ClientContactController::class, 'index'])->name('client.contact.index');
Route::post('/lien-he', [ClientContactController::class, 'store'])->name('client.contact.store');

Route::view('/gioi-thieu', 'about')->name('about');
Route::view('/doi-tac-khach-hang', 'partners')->name('partners');

/*
|--------------------------------------------------------------------------
| AUTH & PROFILE
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
