<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home', [
        'dataWfPage' => '649fd0a508379c19102cde80',
        'dataWfSite' => '6458c8fa2608d11548b9191e',
    ]);
});

Route::prefix('games')->group(function () {

    Route::get('420', function () {
         return view('pages.games.420', [
            'dataWfPage' => '64a134825fdd66827252008a',
            'dataWfSite' => '6458c8fa2608d11548b9191e',
        ]);
    });

});
