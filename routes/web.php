<?php

use App\Http\Controllers\ToDoController;
use App\Models\ToDo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $user =Auth::user();
    $to_dos = ToDo::Where('user_id', $user->id)->get();
    return view('to-do.index', compact('to_dos', 'user'));
})->middleware(['auth'])->name('dashboard');
Route::resource('todo', ToDoController::class)->middleware(['auth']);
Route::get('{todo}/is_complete', [ToDoController::class, 'IsCompleted'])->name('is_completed')->middleware(['auth']);

require __DIR__.'/auth.php';
