<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\SettingsController;
use App\Http\Controllers\AdminControllers\AuthController;
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
use App\Http\Controllers\CustomerControllers\CustomerProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;






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
 * get and display views routes (website views that should not be protected)
 */
Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/our_services', [HomeController::class,'viewOurServices']);
Route::get('/login', [UsersController::class,'index'])->name('login');
Route::get('/freelancer/register',[UsersController::class,'viewFreelancerRegister'])->name('freelancer_register');
Route::get('/vacancy/register',[UsersController::class,'viewVacancyRegister'])->name('vacancy_register');
Route::get('/registeration',[UsersController::class,'viewRegisteration'])->name('registeration');
Route::post('/Signin',[UsersController::class,'viewRegisterationPage'])->name('Signin');

Route::get('/jobs', [JobsController::class,'index']);
Route::get('/job_details', [JobDetailsController::class,'index']);
Route::get('/about_us',[AboutUsController::class,'index']);
Route::get('/contact_us',[ContactUsController::class,'index']);




/**
 * create freelancers and vacancies
 */

Route::post('/freelancer/create', [UsersController::class,'createFreelancer'])->name('freelancer_create');
Route::post('/vacancy/create', [UsersController::class,'createVacancy'])->name('vacancy_create');

/**
 * logging in 
 */
Route::post('/login', [UsersController::class,'logIn'])->name('logging_in');







/**
 * Middleware routes (protected views)
 */
Route::group(['middleware'=>'auth'],function(){

    Route::group(['middleware'=>'role:Super Admin|Contnet Admin'],function(){

	  /**
      * Display dasboard views routes (dashboard views)
     */
      Route::get('dashboard/admin', [AdminController::class,'index'])->name('admin');
      Route::get('admin/users', [UsersController::class,'rolesUsersShow'])->name('users'); 
      Route::get('/update_user', [UsersController::class,'update'])->name('users/update');
	
     /**
      * create  dashboard data  (dashboard )
      * 
     */
    Route::get('/generate_roles', [SettingsController::class,'generateRoles']);
    Route::post('/save_user', [UsersController::class,'create'])->name('save_user');
    Route::resource('user', UsersController::class);



	});
    Route::group(['middleware'=>'role:Customer'],function(){

	
		/**
      * Display profile views routes (profile views)
      */

      Route::get('/freelancer/profile', [CustomerProfileController::class,'index'])->name('profile');
      Route::get('/freelancer/qualifications', [QualificationController::class,'index']);
      Route::get('/courses', [CourseController::class,'index']);
      Route::get('/experiences', [ExperienceController::class,'index']);
      Route::get('/user/skills', [SkillController::class,'index'])->name('skills');





	});
    Route::group(['middleware'=>'role:Vacancy'],function(){

	
	/**
    * Display vacancies dashboard views
    */
    Route::get('/admin/jobs',[JobsController::class,'viewJobs'])->name('view_jobs');


	});
	
  

    Route::get('/logout',[AuthController::class,'logout'])->name('log_out');
	
});
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
