<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->name('admin.')->middleware('checkAuth')->group(function () {
    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    //QL users
    Route::get('/users', function () {
        echo "users list";
    })->name('users.index');

    
});
?>