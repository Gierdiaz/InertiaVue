<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
// Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
// Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
// Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

/*
|--------------------------------------------------------------------------
| employees
|--------------------------------------------------------------------------
*/
Route::prefix('employees')->name('employees.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::get('/show/{employee}', [EmployeeController::class, 'show'])->name('show');
    Route::post('/', [EmployeeController::class, 'store'])->name('store');
    Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('edit');
    Route::put('/update/{employee}', [EmployeeController::class, 'update'])->name('update');
    Route::delete('/delete/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');
});
