<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\client\indexController;

    Route::get('/client', [indexController::class, 'home'])->name('home.index');
 
?>