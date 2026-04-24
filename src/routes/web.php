<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;


Route::get("/", [HomeController::class, "index"]);

// URL for accessing author data.
Route::get("/authors", [AuthorController::class, "list"]);
?>
