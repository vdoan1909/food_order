<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RatingController;
// use App\Http\Controllers\SideDishController;
use Illuminate\Support\Facades\Route;

// Language
Route::get('language/{language}', [LanguageController::class, "index"])->name('language');

Route::get("/", [HomeController::class, "index"])->name("client.home");
Route::get("thanks", [PaymentController::class, "thanks"])->name("client.thanks");

// Admin route
Route::prefix("admin")->middleware('admin')->group(function () {
    // home
    Route::get("home", [AdminController::class, "index"])->name("admin.home");
    // category
    Route::get("category", [CategoryController::class, "index"])->name("admin.category");
    Route::get("category/add", [CategoryController::class, "add"])->name("admin.category.add");
    Route::post("category/post", [CategoryController::class, "store"])->name("admin.category.store");
    Route::get("category/detail/{id}", [CategoryController::class, "detail"])->name("admin.category.detail");
    Route::put("category/edit", [CategoryController::class, "edit"])->name("admin.category.edit");
    Route::get("category/delete/{id}", [CategoryController::class, "delete"])->name("admin.category.delete");

    // news category
    Route::get("news/category", [NewsCategoryController::class, "index"])->name("admin.newscategory");
    Route::get("news/category/add", [NewsCategoryController::class, "add"])->name("admin.newscategory.add");
    Route::post("news/category/post", [NewsCategoryController::class, "store"])->name("admin.newscategory.store");
    Route::get("news/category/detail/{id}", [NewsCategoryController::class, "detail"])->name("admin.newscategory.detail");
    Route::put("news/category/edit", [NewsCategoryController::class, "edit"])->name("admin.newscategory.edit");
    Route::get("news/category/delete/{id}", [NewsCategoryController::class, "delete"])->name("admin.newscategory.delete");

    // dish
    Route::get("dish", [DishController::class, "index"])->name("admin.dish");
    Route::get("dish/add", [DishController::class, "add"])->name("admin.dish.add");
    Route::post("dish/post", [DishController::class, "store"])->name("admin.dish.store");
    Route::get("dish/detail/{id}", [DishController::class, "detail"])->name("admin.dish.detail");
    Route::put("dish/edit", [DishController::class, "edit"])->name("admin.dish.edit");
    Route::get("dish/delete/{id}", [DishController::class, "delete"])->name("admin.dish.delete");

    // // side dish
    // Route::get("side/dish", [SideDishController::class, "index"])->name("admin.sidedish");
    // Route::get("side/dish/add", [SideDishController::class, "add"])->name("admin.sidedish.add");
    // Route::post("side/dish/post", [SideDishController::class, "store"])->name("admin.sidedish.store");
    // Route::get("side/dish/detail/{id}", [SideDishController::class, "detail"])->name("admin.sidedish.detail");
    // Route::put("side/dish/edit", [SideDishController::class, "edit"])->name("admin.sidedish.edit");
    // Route::get("side/dish/delete/{id}", [SideDishController::class, "delete"])->name("admin.sidedish.delete");

    // news
    Route::get("news", [NewsController::class, "index"])->name("admin.news");
    Route::get("news/add", [NewsController::class, "add"])->name("admin.news.add");
    Route::post("news/post", [NewsController::class, "store"])->name("admin.news.store");
    Route::get("news/detail/{id}", [NewsController::class, "detail"])->name("admin.news.detail");
    Route::put("news/edit", [NewsController::class, "edit"])->name("admin.news.edit");
    Route::get("news/delete/{id}", [NewsController::class, "delete"])->name("admin.news.delete");
});

Route::prefix("client")->group(function () {
    Route::get("home", [HomeController::class, "index"])->name("client.home");
    // dish
    Route::get("favorite", [FavoriteController::class, "index"])->name("client.favorite");
    Route::post("favorite/add", [FavoriteController::class, "store"])->name("client.favorite.store");
    Route::post("favorite/remove", [FavoriteController::class, "delete"])->name("client.favorite.remove");
    Route::get("menu", [HomeController::class, "menu"])->name("client.menu");
    Route::get("news/detail/{id}", [HomeController::class, "newsdetail"])->name("client.news.detail");
    Route::get("detail/{id}", [HomeController::class, "detail"])->name("client.detail");
    // account
    Route::get("register", [AccountController::class, "add"])->name("client.register.add");
    Route::post("register/post", [AccountController::class, "store"])->name("client.register.store");
    Route::get("login", [AccountController::class, "loginForm"])->name("client.login.add");
    Route::post("login/post", [AccountController::class, "login"])->name("client.login.store");
    Route::get("info", [AccountController::class, "info"])->name("client.info");
    Route::get("info/edit", [AccountController::class, "infoEdit"])->name("client.info.edit");
    Route::put("info/post/edit", [AccountController::class, "infoPostEdit"])->name("client.info.post.edit");
    Route::get("logout", [AccountController::class, "logout"])->name("client.logout");
    Route::get("forgot", [AccountController::class, "forgot"])->name("client.forgot.add");
    Route::post("forgot/post", [AccountController::class, "forgotForm"])->name("client.forgot.store");
    Route::get("pass/change", [AccountController::class, "changePass"])->name("client.changepass.add");
    Route::post("pass/change/post", [AccountController::class, "changePassForm"])->name("client.changepass.store");
    //cart
    Route::get("cart", [CartController::class, "index"])->name("client.cart");
    Route::post("cart/add", [CartController::class, "store"])->name("client.cart.add");
    Route::put("cart/update", [CartController::class, "update"])->name("client.cart.update");
    Route::get("delete/cart", [CartController::class, "delete"])->name("client.cart.delete");
    // rating
    Route::post("dish/star", [RatingController::class, "store"])->name("client.dish.rating");
    //payment
    Route::match(['get', 'post'], "payment", [PaymentController::class, "vnpay_payment"])->name("client.payment");
    Route::match(['get', 'post'], "checkout", [PaymentController::class, "checkout"])->name("client.cart.checkout");
    Route::post("checkout/confirm", [PaymentController::class, "checkout_confirm"])->name("client.checkout.confirm");
});
