<?php

declare(strict_types=1);

use App\Http\Controllers\TenantAuthController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    // 'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    
    // Ensure this route is correctly defined
    Route::get('/login', [TenantAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [TenantAuthController::class, 'login']);
    Route::get('dashboard', [TenantAuthController::class, 'dashboard'])->name('dashboard');

});
