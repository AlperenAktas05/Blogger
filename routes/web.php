<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index",[\App\Http\Controllers\blogController::class, "index"]) ->name("routeIndex");

Route::post("/createBlog", [\App\Http\Controllers\blogController::class, "createBlogButton"])->name("routeCreateBlogButton");

Route::get("/signup", [\App\Http\Controllers\blogController::class, "signup"]) ->name("routeSignup");

Route::post("/submitSignup", [\App\Http\Controllers\blogController::class, "submitSignup"]) ->name("routeSubmitSignup");

Route::get("/login",[\App\Http\Controllers\blogController::class, "login"]) ->name("routeLogin");

Route::post("/submitLogin", [\App\Http\Controllers\blogController::class, "submitLogin"]) ->name("routeSubmitLogin");

Route::get("/home", [\App\Http\Controllers\blogController::class, "home"]) ->name("routeHome");

Route::get("/writeBlog", [\App\Http\Controllers\blogController::class, "writeBlog"]) ->name("routeWriteBlog");

Route::post("/home", [\App\Http\Controllers\blogController::class, "submitWriteBlog"])->name("routeSubmitWriteBlog");

Route::get("/profile", [\App\Http\Controllers\blogController::class, "profile"]) ->name("routeProfile");

Route::get("/discover", [\App\Http\Controllers\blogController::class, "discover"]) ->name("routeDiscover");

Route::get("/blogs/{id}", [\App\Http\Controllers\blogController::class, "blogs"]) ->name("routeBlogs");

Route::get("/notifications", [\App\Http\Controllers\blogController::class, "notifications"]) ->name("routeNotifications");

Route::get("/settings", [\App\Http\Controllers\blogController::class, "settings"]) ->name("routeSettings");
