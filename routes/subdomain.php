<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function ($subdomain) {
   return 'subdomain '.$subdomain;
});*/

Route::get('/', [\App\Http\Controllers\Subdomain\SubdomainController::class, 'index'])->name('subdomain.index');


