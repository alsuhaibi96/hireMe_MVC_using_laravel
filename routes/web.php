<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\SettingsController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\HomeController;
use App\Http\Controllers\AdminControllers\UsersController;
use App\Http\Controllers\AdminControllers\JobsController;
use App\Http\Controllers\AdminControllers\JobDetailsController;
use App\Http\Controllers\AdminControllers\AboutUsController;
use App\Http\Controllers\AdminControllers\ContactUsController;
use App\Http\Controllers\CustomerControllers\ProfileController;
use App\Http\Controllers\CustomerControllers\ExperienceController;
use App\Http\Controllers\CustomerControllers\SkillController;
use App\Http\Controllers\CustomerControllers\CourseController;
use App\Http\Controllers\CustomerControllers\QualificationController;




/*ctrl+shift
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * get and display views routes (website views)
 */
Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/our_services', [HomeController::class,'viewOurServices']);
Route::get('/login', [UsersController::class,'index']);
Route::get('/register',[UsersController::class,'viewRegister']);
Route::get('/jobs', [JobsController::class,'index']);
Route::get('/job_details', [JobDetailsController::class,'index']);
Route::get('/about_us',[AboutUsController::class,'index']);
Route::get('/contact_us',[ContactUsController::class,'index']);


/**
 * Display profile views routes (profile views)
 */

Route::get('/profile', [ProfileController::class,'index']);
Route::get('/qualifications', [QualificationController::class,'index']);
Route::get('/courses', [CourseController::class,'index']);
Route::get('/experiences', [ExperienceController::class,'index']);
Route::get('/skills', [SkillController::class,'index']);






/**
 * Display dasboard views routes (dashboard views)
 */
Route::get('/admin', [AdminController::class,'index']);
Route::get('/users', [UsersController::class,'rolesUsersShow'])->name('users');
Route::get('/update_user', [UsersController::class,'update'])->name('users/update');

// Route::resource('users', UsersController::class);




/**
 * create  dashboard data  (dashboard )
 * 
 */
Route::get('/generate_roles', [SettingsController::class,'generateRoles']);
Route::post('/save_user', [UsersController::class,'create'])->name('save_user');
Route::resource('user', UsersController::class);

