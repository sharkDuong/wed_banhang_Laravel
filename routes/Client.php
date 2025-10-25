<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\client\indexController;

    Route::get('/', [indexController::class, 'home'])->name('home.index');
 
?>