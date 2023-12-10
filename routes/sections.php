<?php

use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){

  Route::resource('sections', SectionController::class);
});