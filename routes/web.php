<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('download', function() {

    // autorização

    $nomeDoArquivo = request()->file;
    $file = 'fotos/'. $nomeDoArquivo;


    $storage = Storage::get($file);



    echo base64_encode($storage);

    dd('oi');

    return response()->download($file, 'jeremias.png');



});

require __DIR__.'/auth.php';
