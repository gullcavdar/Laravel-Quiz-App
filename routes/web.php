<?php

use App\Http\Controllers\Admin\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;


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


// routing
Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');


Route::group([
    'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin'
], function () {
    // destroya delete ile ulaştığımız için get ile route yaparak ulaştık
    //yukarı yazmamız lazım. okuma yukardan aşağı gerçekleşiyor.
    // whereNumber yaptık çünkü create de bulunamdı hatası verdi
    //id gelirse delete gelmezse oluştura gönder
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quiz/{quiz_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('quizzes', QuizController::class);
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
});



