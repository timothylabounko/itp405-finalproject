<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessLoginController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AuthenticateViewer;
use App\Models\Data;
use Illuminate\Http\Request;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Home Page route
Route::get('/arcgis', function () {
    return view('arcgis');
})->name('arcgis');

// Survey routes
Route::middleware(['auth', AuthenticateViewer::class])->group(function () {
    Route::get('/survey', [BusinessController::class, 'showSurvey'])->name('survey');
    Route::post('/submit-survey', function(Request $request) {
        $data = new Data();
        $data->fill($request->all());
        $data->user_id = auth()->id();
        $data->save();
        return redirect()->back()->with('success', 'Survey submitted successfully!');
    })->name('submit_survey');
});

// Business Points routes
Route::middleware(['auth', AuthenticateViewer::class])->group(function () {
    Route::get('/business-points', [BusinessController::class, 'showData'])->name('business_points');
});

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout route
Route::middleware('auth')->post('/logout', [BusinessLoginController::class, 'logout'])->name('logout');

// Login route
Route::get('/login', [BusinessLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [BusinessLoginController::class, 'login'])->name('login.submit');

// Comments routes
Route::middleware(['auth', AuthenticateViewer::class])->group(function () {
    Route::get('/blog', [CommentController::class, 'showComments'])->name('blog');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
});

// Marks routes
Route::get('/marks', [MarkController::class, 'index'])->name('marks.index');
Route::post('/marks/{commentId}/add', [MarkController::class, 'add'])->name('marks.add');
Route::delete('/marks/{commentId}/remove', [MarkController::class, 'remove'])->name('marks.remove');
