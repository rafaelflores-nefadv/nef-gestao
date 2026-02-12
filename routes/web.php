<?php

use App\Http\Controllers\Governance\HierarchicalRoleController;
use App\Http\Controllers\Governance\SystemPermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalAtivos = \App\Models\User::where('active', true)->count();
    $desativados = \App\Models\User::where('active', false)->count();
    $syncErrors = [];
    $porSetor = [];
    $porRole = [];
    $logs = [];
    return view('dashboard', compact('totalAtivos', 'desativados', 'syncErrors', 'porSetor', 'porRole', 'logs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users resource
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/disabled', [App\Http\Controllers\UserController::class, 'disabled'])->name('users.disabled');

    // Sectors resource
    Route::resource('sectors', App\Http\Controllers\SectorController::class);

    // Profiles resource
    Route::resource('profiles', App\Http\Controllers\ProfileController::class);
    Route::get('profiles/link-ad-groups/{profile}', [App\Http\Controllers\ProfileController::class, 'linkAdGroups'])->name('profiles.link-ad-groups');

    // AD Groups resource
    Route::resource('ad-groups', App\Http\Controllers\AdGroupController::class);
    Route::post('ad-groups/sync', [App\Http\Controllers\AdGroupController::class, 'sync'])->name('ad-groups.sync');

    // Companies resource
    Route::resource('companies', App\Http\Controllers\CompanyController::class);

    // Audit Logs resource
    Route::resource('audit-logs', App\Http\Controllers\AuditLogController::class);
    Route::get('audit-logs/admin', [App\Http\Controllers\AuditLogController::class, 'admin'])->name('audit-logs.admin');
    Route::get('audit-logs/ad-sync', [App\Http\Controllers\AuditLogController::class, 'adSync'])->name('audit-logs.ad-sync');

    // Governance
    Route::prefix('governance')->group(function () {
        Route::get('hierarchical-roles', [HierarchicalRoleController::class, 'index'])->name('hierarchical-roles.index');
        Route::get('system-permissions', [SystemPermissionController::class, 'index'])->name('system-permissions.index');
    });
});

require __DIR__.'/auth.php';
