<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/** User Frontend **/

// redirect by the user type
Route::get('/redirects', 'StudentController@usertyp');


// Students
Route::get('/students', 'StudentController@index');
Route::get('/students/home', 'StudentController@home')-> name('studenttype');

// admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/home', 'AdminController@home') -> name('admintype');

// Teachers
Route::get('/teachers', 'TeacherController@index');
Route::get('/teachers/home', 'TeacherController@home') -> name('teachertype');

// Parents
Route::get('/parents', 'ParentController@index');
Route::get('/parents/home', 'ParentController@home') -> name('parenttype');


// admin actions
Route::get('/admin/admission/students', 'AdminController@admission');
Route::post('/admin/admission/students/add', 'AdminController@admissionform');

Route::get('/admin/courses', 'AdminController@courses');
Route::post('/admin/courses/add', 'AdminController@coursesform');

Route::get('/admin/teachers', 'AdminController@teachers');
Route::post('/admin/teachers/add', 'AdminController@teachersform');

Route::get('/admin/routine/students', 'AdminController@routineselect');
Route::get('/admin/routine/exam', 'AdminController@examroutineselect');

Route::get('/admin/departments', 'AdminController@departments');
Route::post('/admin/departments/add', 'AdminController@adddepartment');

Route::post('/admin/routine/students/add', 'AdminController@addroutine');
Route::get('/admin/routine/{id}/edit', 'AdminController@editroutine');
Route::get('/admin/routine/{id}/delete', 'AdminController@deleteroutine');
Route::post('/admin/routine/update', 'AdminController@updateroutine');

Route::get('/admin/notice', 'AdminController@notice');
Route::post('/admin/notice/upload', 'AdminController@uploadnotice');
Route::get('/admin/notice/{id}/delete', 'AdminController@deletenotice');

Route::get('/admin/students', 'AdminController@students');
Route::get('/admin/students/promote', 'AdminController@promotestudents');
Route::get('/admin/students/{id}/delete', 'AdminController@deletestudents');

Route::get('/admin/parents', 'AdminController@parents');

Route::get('/admin/results', 'AdminController@results');
Route::get('/admin/results/publish', 'AdminController@publishresults');


// teacher actions
Route::get('/teachers/materials', 'TeacherController@materials');
Route::post('/teachers/materials/upload', 'TeacherController@uploadmaterials');

Route::get('/teachers/attendance', 'TeacherController@attendance');
Route::get('/teachers/attendance/{id}/daily', 'TeacherController@dailyattendance');
Route::get('/teachers/attendance', 'TeacherController@attendance');
Route::post('/teachers/attendance/daily/upload', 'TeacherController@uploadattendance');

Route::get('/teachers/results', 'TeacherController@results');
Route::get('/teachers/results/mid/{id}/upload', 'TeacherController@selectmidresults');
Route::get('/teachers/results/final/{id}/upload', 'TeacherController@selectfinalresults');
Route::post('/teachers/results/mid/upload', 'TeacherController@uploadmidresult');
Route::post('/teachers/results/final/upload', 'TeacherController@uploadfinalresult');


// student actions
Route::get('/students/materials', 'StudentController@stdmaterials');
Route::post('/students/materials/search', 'StudentController@searchmaterials');
Route::get('/students/materials/{id}/download', 'StudentController@downloadmaterials');

Route::get('/students/notice', 'StudentController@notice');

Route::get('/students/attendance', 'StudentController@attendance');




