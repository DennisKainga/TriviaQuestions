<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriviaQuestionController;
use App\Models\TriviaQuestion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/',[TriviaQuestionController::class,'random']);

Route::prefix('trivia_questions')->group(function(){

    Route::get('/',[TriviaQuestionController::class,'index']);

    Route::post('/',[TriviaQuestionController::class, 'store']);
    
    Route::get('/{trivialquestion}',[TriviaQuestionController::class, 'show']);

    Route::put('/{trivialquestion}', [TriviaQuestionController::class, 'update']);

    Route::delete('/{trivialquestion}', [TriviaQuestionController::class, 'destroy']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
