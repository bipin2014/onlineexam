<?php
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
    return view('welcome');
});

// Route::get('/profile', function () {})->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'DashboardController@index');



// Route::get('/dashboard', 'StudentController@student');

Route::get('/dashboard/{id}', 'StudentController@examquestions');

Route::post('/dashboard/{id}/showresult', 'ResultController@showResult');




Route::group(['middleware'=> 'App\Http\Middleware\AdminMiddleware'],function(){

    Route::resource('exam','ExamController');

    Route::get('/admin/dashboard', 'ExamController@admin')->name('admin');

    Route::get('/admin/dashboard/{id}', 'ExamController@examquestions');

    Route::get('/admin/dashboard/{id}/editquestion/{q_id}', 'QuestionController@edit');

    Route::get('/admin/dashboard/{id}/addquestion', 'QuestionController@show');

    Route::resource('/admin/dashboard/{id}/addlistening', 'ListeningController');

    Route::post('/admin/dashboard/addquestion', 'QuestionController@store')->name('uploadquestion');

    Route::put('/admin/dashboard/edit/{editquestion}', 'QuestionController@update')->name('editquestion');

    Route::delete('/question/{id}','QuestionController@destroy');

});

