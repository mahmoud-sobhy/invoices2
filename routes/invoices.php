<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

    Route::resource('invoices', InvoiceController::class);
});