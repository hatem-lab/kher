<?php


use Illuminate\Support\Facades\Route;
use App\Http\Livewire\StudentCalendar;

Route::get('site/register', [App\Http\Controllers\Site\RegisterController::class, 'register'])->name('site.getRegister');
Route::post('site/register/create', [App\Http\Controllers\Site\RegisterController::class, 'create'])->name('site.register.create');
Route::get('site/library', [App\Http\Controllers\Site\HomeController::class, 'library'])->name('site.library');

Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'home'])->name('site.home.slash');
Route::get('/home', [App\Http\Controllers\Site\HomeController::class, 'home'])->name('site.home');
Route::get('/home/about', [App\Http\Controllers\Site\HomeController::class, 'about'])->name('site.about');
Route::get('/home', [App\Http\Controllers\Site\HomeController::class, 'home'])->name('site.home');
Route::get('/home/inreview', [App\Http\Controllers\Site\VerificationCodeController::class, 'inreview'])->name('site.home.inreview');
Route::group(['prefix' => 'student','middleware' => ['VerifiedUser' , 'localization']], function () {

Route::get('/courses', [App\Http\Controllers\Site\HomeController::class, 'courses'])->name('courses');
Route::get('/studentcourses', [App\Http\Controllers\Site\HomeController::class, 'studentcourses'])->name('studentcourses');

Route::get('/studentdiplomas', [App\Http\Controllers\Site\HomeController::class, 'studentdiplomas'])->name('studentdiplomas');
Route::get('/coursedetails/{id}', [App\Http\Controllers\Site\HomeController::class, 'coursedetails'])->name('coursedetails');

Route::get('/diplomas', [App\Http\Controllers\Site\HomeController::class, 'diplomas'])->name('diplomas');
Route::get('/diplomadetails/{id}', [App\Http\Controllers\Site\HomeController::class, 'diplomadetails'])->name('diplomadetails');
Route::get('/lecturedetails/{id}', [App\Http\Controllers\Site\HomeController::class, 'lecturedetails'])->name('lecturedetails');
Route::get('/user-blogs', [App\Http\Controllers\Site\BlogController::class, 'GetAllBlogs'])->name('user_blogs');
Route::get('/blog-details/{id}', [App\Http\Controllers\Site\BlogController::class, 'GetBlogDetails'])->name('blog_details');

});
//Route::get('user/blogs',function (){
//    return view('user.blog');
//});


Route::get('/logout', [App\Http\Controllers\Site\LoginController::class, 'logoutUser'])->name('user.logout');

Route::get('site/login', [App\Http\Controllers\Site\LoginController::class, 'getLogin'])->name('getLogin');
Route::post('user/login',  [App\Http\Controllers\Site\LoginController::class, 'login'])->name('user.login');
Route::get('user/login',  [App\Http\Controllers\Site\LoginController::class, 'login'])->name('user.loginUser');

Route::get('student/verify', [\App\Http\Controllers\Site\VerificationCodeController::class,'getVerifyPage'])->name('get.verification.form');
Route::post('verify-user/', [\App\Http\Controllers\Site\VerificationCodeController::class,'verify'])->name('verify-user');
Route::get('/contact_us',[App\Http\Controllers\CalendarController::class, 'Contact'])->name('Contact_us');
Route::post('/send-email',[App\Http\Controllers\CalendarController::class, 'Send_Email'])->name('send_email');

///////////////////// for students //////////////////////////////////

Route::group(['prefix' => 'student','middleware' => ['auth-student:student','VerifiedUser' , 'localization']], function () {
    Route::get('/courses_register', [App\Http\Controllers\Site\HomeController::class, 'coursesRegister'])->name('coursesregister');
    Route::get('/requestcertificate/{diploma_id}', [App\Http\Controllers\Site\HomeController::class, 'requestcertificate'])->name('student.course.requestcertificate');

    Route::post('register/{id}',  [App\Http\Controllers\Site\HomeController::class, 'registerCourse'])->name('student.register');
    Route::get('homeworks',  [App\Http\Controllers\Site\HomeworkController::class, 'getAllHomeworkStudent'])->name('student.homeworks');
    Route::get('homework/{id}',  [App\Http\Controllers\Site\HomeworkController::class, 'getHomeworkDetails'])->name('student.homework');
    Route::post('attachments/{id}',  [App\Http\Controllers\Site\HomeworkController::class, 'SaveFiles'])->name('student.attachments');
    Route::get('progress',  [App\Http\Controllers\Site\ProgressController::class, 'getProgressStudent'])->name('student.progress');
    Route::post('update/profile',  [App\Http\Controllers\Site\ProgressController::class, 'UpdateProfileStudent'])->name('student.update.profile');
    Route::get('course_details/{id}',[App\Http\Controllers\Site\ProgressController::class, 'Course_Details'])->name('Course_details');
    Route::get('/profile',[App\Http\Controllers\Site\ProgressController::class, 'profile'])->name('student.profile');

    Route::get('/myTests', [App\Http\Controllers\Site\TestController::class, 'allTestsForStudent'])->name('student_tests');
    Route::get('/test_details/{id}', [App\Http\Controllers\Site\TestController::class, 'testDetailsForStudent'])->name('student.test');
    Route::get('/test/{id}/questions', [App\Http\Controllers\Site\TestController::class, 'testQuestions'])->name('student.test.questions');
    Route::post('/test/{id}/applyTest', [App\Http\Controllers\Site\TestController::class, 'applyTest'])->name('student.test.apply_test');


    Route::get('my-notifications', [\App\Http\Controllers\Site\NotificationController::class, 'getNotificationsForStudent'])->name('student-my-notifications');
    Route::get('unread-notification-num', [\App\Http\Controllers\Site\NotificationController::class, 'getNumOfUnReadNotification'])->name('student-ajax-unread-notification-num');
    Route::get('show-notification-brief', [\App\Http\Controllers\Site\NotificationController::class, 'getNotificationsBriefly'])->name('student-ajax-get-notification-brief');
    Route::get('survay',  [App\Http\Controllers\Site\survayControlle::class, 'allsurveyForStudent'])->name('student.survay');
    Route::get('/survay_details/{id}', [App\Http\Controllers\Site\survayControlle::class, 'survayDetailsForStudent'])->name('student.survayD');
    Route::get('/survay/{id}/questions', [App\Http\Controllers\Site\survayControlle::class, 'survayQuestions'])->name('student.survay.questions');
    Route::post('/survay/{id}/applysurvay', [App\Http\Controllers\Site\survayControlle::class, 'applysurvay'])->name('student.survay.apply_survay');

    Route::get('/calendar',[App\Http\Controllers\Site\calendarController::class, 'index'])->name('student.calendar');

    Route::post('/reply/store', [App\Http\Controllers\Site\BlogController::class, 'store'])->name('reply.store');
    Route::post('/comment/store', [App\Http\Controllers\Site\BlogController::class, 'Commentstore'])->name('comment.store');
});



/////////////////// for admins //////////////////////////////////
Route::group(['prefix' => 'user','middleware' => ['auth-user:user' , 'localization']], function () {

    Route::post('/reply/userstore', [App\Http\Controllers\Site\BlogController::class, 'store'])->name('reply.userstore');
    Route::post('/comment/userstore', [App\Http\Controllers\Site\BlogController::class, 'Commentstore'])->name('comment.userstore');

});
