<?php

use Illuminate\Support\Facades\Route;
use Anjalicct\Category\Controllers\CategoryController;
use Illuminate\Http\Request;


    /** Route for Category Module */

    Route::get('/greet/{name}', [CategoryController::class, 'greet']);

    Route::get('/categorypkg/index', [CategoryController::class, 'index'])->name('category.index');  

    Route::get('/category/treeview/categoryTreeview', [CategoryController::class, 'categoryTreeview'])->name('category.treeview');

    Route::get('/category/trash', [CategoryController::class, 'trash'])->name('category.trash');

    Route::get('/category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');

    Route::post('/category/categorylist', [CategoryController::class, 'categorylist'])->name('category.categorylist');

    Route::resource('/category', CategoryController::class);

?>