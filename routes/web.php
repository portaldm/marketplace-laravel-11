<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Chamando rotas de arquivos separados
foreach (File::allFiles(__DIR__ . '/web') as $route_file) {
    require $route_file->getPathname();
}

require __DIR__.'/auth.php';

//Rota de login do admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

//Rota de login recuperação de senha
Route::get('admin/forgot-password', [AdminController::class, 'forgot'])->name('admin.forgot');
