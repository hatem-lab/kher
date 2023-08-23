<?php

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Livewire\Accordion;
use App\Http\Livewire\Alerts;
use App\Http\Livewire\Avatar;
use App\Http\Livewire\Background;
use App\Http\Livewire\Badge;
use App\Http\Livewire\Blog;
use App\Http\Livewire\Border;
use App\Http\Livewire\Breadcrumbs;
use App\Http\Livewire\Buttons;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Cards;
use App\Http\Livewire\Carousel;
use App\Http\Livewire\ChartChartjs;
use App\Http\Livewire\ChartEchart;
use App\Http\Livewire\ChartFlot;
use App\Http\Livewire\ChartMorris;
use App\Http\Livewire\ChartPeity;
use App\Http\Livewire\ChartSparkline;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Collapse;
use App\Http\Livewire\Contacts;
use App\Http\Livewire\Counters;
use App\Http\Livewire\Display;
use App\Http\Livewire\Draggablecards;
use App\Http\Livewire\Dropdown;
use App\Http\Livewire\Editprofile;
use App\Http\Livewire\Emptypage;
use App\Http\Livewire\Error404;
use App\Http\Livewire\Error500;
use App\Http\Livewire\Extras;
use App\Http\Livewire\Faq;
use App\Http\Livewire\Flex;
use App\Http\Livewire\Forgot;
use App\Http\Livewire\FormAdvanced;
use App\Http\Livewire\FormEditor;
use App\Http\Livewire\FormElements;
use App\Http\Livewire\FormLayouts;
use App\Http\Livewire\FormValidation;
use App\Http\Livewire\FormWizards;
use App\Http\Livewire\Gallery;
use App\Http\Livewire\Height;
use App\Http\Livewire\Icons;
use App\Http\Livewire\ImageCompare;
use App\Http\Livewire\Images;
use App\Http\Livewire\Index;
use App\Http\Livewire\Invoice;
use App\Http\Livewire\ListGroup;
use App\Http\Livewire\Lockscreen;
use App\Http\Livewire\Mail;
use App\Http\Livewire\MailCompose;
use App\Http\Livewire\MailRead;
use App\Http\Livewire\MailSettings;
use App\Http\Livewire\MapLeaflet;
use App\Http\Livewire\MapVector;
use App\Http\Livewire\Margin;
use App\Http\Livewire\MediaObject;
use App\Http\Livewire\Modals;
use App\Http\Livewire\Navigation;
use App\Http\Livewire\Notification;
use App\Http\Livewire\Padding;
use App\Http\Livewire\Pagination;
use App\Http\Livewire\Popover;
use App\Http\Livewire\Position;
use App\Http\Livewire\Pricing;
use App\Http\Livewire\ProductCart;
use App\Http\Livewire\ProductDetails;
use App\Http\Livewire\Products;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Progress;
use App\Http\Livewire\Rangeslider;
use App\Http\Livewire\Rating;
use App\Http\Livewire\Reset;
use App\Http\Livewire\Search;
use App\Http\Livewire\Signin;
use App\Http\Livewire\Signup;
use App\Http\Livewire\Spinners;
use App\Http\Livewire\SweetAlert;
use App\Http\Livewire\TableBasic;
use App\Http\Livewire\TableData;
use App\Http\Livewire\Tabs;
use App\Http\Livewire\Tags;
use App\Http\Livewire\Thumbnails;
use App\Http\Livewire\Timeline;
use App\Http\Livewire\Toast;
use App\Http\Livewire\Todotask;
use App\Http\Livewire\Tooltip;
use App\Http\Livewire\Treeview;
use App\Http\Livewire\Typography;
use App\Http\Livewire\Underconstruction;
use App\Http\Livewire\Userlist;
use App\Http\Livewire\WidgetNotification;
use App\Http\Livewire\Widgets;
use App\Http\Livewire\Width;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::get('test', function() {

    $path = Storage::disk('google')->put('test.pdf', 'Hello World');
//    Storage::disk('public_uploads_homework_student_file')->put('test.txt', 'Hello World');
    //$path = Storage::disk('google')->path('');
    dd($path);
});


Route::get('user/test', function () {
    return view('user.about');
});
//Route::get('/', function () {
//    return view('livewire.index');
//});
//Route::get('accordion', Accordion::class);
//Route::get('alerts', Alerts::class);
//Route::get('avatar', Avatar::class);
//Route::get('background', Background::class);
//Route::get('badge', Badge::class);
//Route::get('blog', Blog::class);
//Route::get('border', Border::class);
//Route::get('breadcrumbs', Breadcrumbs::class);
//Route::get('buttons', Buttons::class);
//Route::get('calendar', Calendar::class);
//Route::get('cards', Cards::class);
//Route::get('carousel', Carousel::class);
//Route::get('chart-chartjs', ChartChartjs::class);
//Route::get('chart-echart', ChartEchart::class);
//Route::get('chart-flot', ChartFlot::class);
//Route::get('chart-morris', ChartMorris::class);
//Route::get('chart-peity', ChartPeity::class);
//Route::get('chart-sparkline', ChartSparkline::class);
//Route::get('chat', Chat::class);
//Route::get('collapse', Collapse::class);
//Route::get('contacts', Contacts::class);
//Route::get('counters', Counters::class);
//Route::get('display', Display::class);
//Route::get('draggablecards', Draggablecards::class);
//Route::get('dropdown', Dropdown::class);
//Route::get('editprofile', Editprofile::class);
//Route::get('emptypage', Emptypage::class);
//Route::get('extras', Extras::class);
//Route::get('faq', Faq::class);
//Route::get('flex', Flex::class);
//Route::get('forgot', Forgot::class);
//Route::get('form-advanced', FormAdvanced::class);
//Route::get('form-editor', FormEditor::class);
//Route::get('form-elements', FormElements::class);
//Route::get('form-layouts', FormLayouts::class);
//Route::get('form-validation', FormValidation::class);
//Route::get('form-wizards', FormWizards::class);
//Route::get('gallery', Gallery::class);
//Route::get('height', Height::class);
//Route::get('icons', Icons::class);
//Route::get('image-compare', ImageCompare::class);
//Route::get('images', Images::class);
//Route::get('index', Index::class);
//Route::get('invoice', Invoice::class);
//Route::get('list-group', ListGroup::class);
//Route::get('lockscreen', Lockscreen::class);
//Route::get('mail', Mail::class);
//Route::get('mail-compose', MailCompose::class);
//Route::get('mail-read', MailRead::class);
//Route::get('mail-settings', MailSettings::class);
//Route::get('map-leaflet', MapLeaflet::class);
//Route::get('map-vector', MapVector::class);
//Route::get('margin', Margin::class);
//Route::get('media-object', MediaObject::class);
//Route::get('modals', Modals::class);
//Route::get('navigation', Navigation::class);
//Route::get('notification', Notification::class);
//Route::get('padding', Padding::class);
//Route::get('pagination', Pagination::class);
//Route::get('popover', Popover::class);
//Route::get('position', Position::class);
//Route::get('pricing', Pricing::class);
//Route::get('product-cart', ProductCart::class);
//Route::get('product-details', ProductDetails::class);
//Route::get('products', Products::class);
//Route::get('profile', Profile::class);
//Route::get('progress', Progress::class);
//Route::get('rangeslider', Rangeslider::class);
//Route::get('rating', Rating::class);
//Route::get('reset', Reset::class);
//Route::get('search', Search::class);
//Route::get('signin', Signin::class);
//Route::get('signup', Signup::class);
//Route::get('spinners', Spinners::class);
//Route::get('sweet-alert', SweetAlert::class);
//Route::get('table-basic', TableBasic::class);
//Route::get('table-data', TableData::class);
//Route::get('tabs', Tabs::class);
//Route::get('tags', Tags::class);
//Route::get('thumbnails', Thumbnails::class);
//Route::get('timeline', Timeline::class);
//Route::get('toast', Toast::class);
//Route::get('todotask', Todotask::class);
//Route::get('tooltip', Tooltip::class);
//Route::get('treeview', Treeview::class);
//Route::get('typography', Typography::class);
//Route::get('underconstruction', Underconstruction::class);
//Route::get('userlist', Userlist::class);
//Route::get('widget-notification', WidgetNotification::class);
//Route::get('widgets', Widgets::class);
//Route::get('width', Width::class);
//Route::get('error500', Error500::class);
//Route::get('error404', Error404::class);
Auth::routes();






Route::group(['prefix' => 'admin','middleware' => ['auth:admin' , 'localization']], function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
    Route::post('profile/update/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::get('request/certificate', [App\Http\Controllers\Admin\StudentController::class, 'request'])->name('request.certificate');
    Route::get('certificate/{request_sent}/{student_id}/{diploma_id}', [App\Http\Controllers\Admin\StudentController::class, 'pdf'])->name('certificate');
    Route::get('certificate/view_certificate/{path}', [App\Http\Controllers\Admin\StudentController::class, 'open_certificate_student'])->name('certificate.view_certificate');


    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::post('user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
    Route::get('user/show/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::post('user/changeStatus', [App\Http\Controllers\Admin\UserController::class, 'change_status'])->name('user.changeStatus');

    Route::get('roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles.index');
    Route::get('role/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('role.create');
    Route::post('role/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('role.store');
    Route::get('role/show/{id}', [App\Http\Controllers\Admin\RoleController::class, 'show'])->name('role.show');
    Route::get('role/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/update/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role.update');
    Route::post('role/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.destroy');


    Route::get('certificates', [App\Http\Controllers\Admin\CertificateController::class, 'index'])->name('certificate.index');
    Route::get('certificates/create', [App\Http\Controllers\Admin\CertificateController::class, 'create'])->name('certificate.create');
    Route::post('certificates/store', [App\Http\Controllers\Admin\CertificateController::class, 'store'])->name('certificate.store');
    Route::get('certificates/edit/{id}', [App\Http\Controllers\Admin\CertificateController::class, 'edit'])->name('certificate.edit');
    Route::post('certificates/update/{id}', [App\Http\Controllers\Admin\CertificateController::class, 'update'])->name('certificate.update');
    Route::post('certificates/delete/{id}', [App\Http\Controllers\Admin\CertificateController::class, 'destroy'])->name('certificate.destroy');

    Route::get('diplomas', [App\Http\Controllers\Admin\DiplomaController::class, 'index'])->name('diploma.index');
    Route::get('diplomas/create', [App\Http\Controllers\Admin\DiplomaController::class, 'create'])->name('diploma.create');
    Route::post('diplomas/store', [App\Http\Controllers\Admin\DiplomaController::class, 'store'])->name('diploma.store');
    Route::get('diplomas/edit/{id}', [App\Http\Controllers\Admin\DiplomaController::class, 'edit'])->name('diploma.edit');
    Route::post('diplomas/update/{id}', [App\Http\Controllers\Admin\DiplomaController::class, 'update'])->name('diploma.update');
    Route::post('diplomas/delete/{id}', [App\Http\Controllers\Admin\DiplomaController::class, 'destroy'])->name('diploma.destroy');
    Route::get('diplomas/show/{id}', [App\Http\Controllers\Admin\DiplomaController::class, 'show'])->name('diploma.show');

    Route::get('courses', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('course.index');
    Route::get('courses/pendinglist', [App\Http\Controllers\Admin\CourseController::class, 'pendingList'])->name('course.pendinglist');
    Route::get('courses/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('course.create');
    Route::post('courses/store', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('course.store');
    Route::get('courses/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('course.edit');
    Route::get('courses/pending/{id}', [App\Http\Controllers\Admin\CourseController::class, 'pending'])->name('course.pending');
    Route::get('courses/accept/{id}', [App\Http\Controllers\Admin\CourseController::class, 'accept'])->name('course.accept');
    Route::get('courses/acceptlist/{id}', [App\Http\Controllers\Admin\CourseController::class, 'acceptlist'])->name('course.acceptlist');
    Route::get('courses/rejectlist/{id}', [App\Http\Controllers\Admin\CourseController::class, 'rejectlist'])->name('course.rejectlist');
    Route::get('courses/reject/{id}', [App\Http\Controllers\Admin\CourseController::class, 'reject'])->name('course.reject');
    Route::post('courses/update/{id}', [App\Http\Controllers\Admin\CourseController::class, 'update'])->name('course.update');
    Route::post('courses/delete/{id}', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('course.destroy');
    Route::get('courses/show/{id}', [App\Http\Controllers\Admin\CourseController::class, 'show'])->name('course.show');
    Route::get('Close_Course', [App\Http\Controllers\Admin\CourseController::class, 'Close_Course'])->name('Close_Course');
    Route::post('courses/changeFinishStatus', [App\Http\Controllers\Admin\CourseController::class, 'changeFinishStatus'])->name('course.changeFinishStatus');




    Route::get('homework', [App\Http\Controllers\Admin\HomeworkController::class, 'index'])->name('homework.index');
    Route::get('homework/create', [App\Http\Controllers\Admin\HomeworkController::class, 'create'])->name('homework.create');
    Route::post('homework/store', [App\Http\Controllers\Admin\HomeworkController::class, 'store'])->name('homework.store');
    Route::get('homework/edit/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'edit'])->name('homework.edit');
    Route::post('homework/update/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'update'])->name('homework.update');
    Route::post('homework/delete/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'destroy'])->name('homework.destroy');
    Route::get('homework/show/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'show'])->name('homework.show');
    Route::post('homework/Attachments', [App\Http\Controllers\Admin\HomeworkController::class, 'attachments'])->name('homework.Attachments');
    Route::get('homework/download/{path}/{file_name}', [App\Http\Controllers\Admin\HomeworkController::class, 'get_file'])->name('homework.download');
    Route::get('homework/View_file/{path}/{file_name}', [App\Http\Controllers\Admin\HomeworkController::class, 'open_file'])->name('homework.View_file');
    Route::post('homework/delete_file/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'destroy_file'])->name('homework.delete_file');
    Route::get('homework/add_files/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'add_files'])->name('homework.add_files');
    Route::get('homework/{id}/students', [App\Http\Controllers\Admin\HomeworkController::class, 'homeworkStudents'])->name('homework.students');
    Route::get('homework/{id}/students/{stud_id}/answers', [App\Http\Controllers\Admin\HomeworkController::class, 'homeworkStudentsAnswers'])->name('homework.students.answers');
    Route::post('homework/{id}/students/{stud_id}/answers', [App\Http\Controllers\Admin\HomeworkController::class, 'correctStudentsAnswers'])->name('homework.students.correctAnswers');
    Route::get('homework/View_file_student/{path}/{file_id}', [App\Http\Controllers\Admin\HomeworkController::class, 'open_file_student'])->name('homework.View_file_student');
    Route::get('homework/download_student/{path}/{file_id}', [App\Http\Controllers\Admin\HomeworkController::class, 'get_file_student'])->name('homework.download_student');
    Route::get('homework/selectLectures/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'selectLectures'])->name('homework.select');
    Route::get('homework/selectStudents/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'selectStudents'])->name('homework.select');
    Route::get('homework/selectTeachers/{id}', [App\Http\Controllers\Admin\HomeworkController::class, 'selectTeachers'])->name('homework.select');


    Route::get('lectures', [App\Http\Controllers\Admin\LectureController::class, 'index'])->name('lecture.index');
    Route::get('lectures/create', [App\Http\Controllers\Admin\LectureController::class, 'create'])->name('lecture.create');
    Route::post('lectures/store', [App\Http\Controllers\Admin\LectureController::class, 'store'])->name('lecture.store');
    Route::get('lectures/edit/{id}', [App\Http\Controllers\Admin\LectureController::class, 'edit'])->name('lecture.edit');
    Route::post('lectures/update/{id}', [App\Http\Controllers\Admin\LectureController::class, 'update'])->name('lecture.update');
    Route::post('lectures/delete/{id}', [App\Http\Controllers\Admin\LectureController::class, 'destroy'])->name('lecture.destroy');
    Route::get('lectures/add_files/{id}', [App\Http\Controllers\Admin\LectureController::class, 'add_files'])->name('lecture.add_files');
    Route::post('lectures/Attachments', [App\Http\Controllers\Admin\LectureController::class, 'attachments'])->name('lecture.Attachments');
    Route::get('lectures/download/{path}/{file_name}', [App\Http\Controllers\Admin\LectureController::class, 'get_file'])->name('lecture.download');
    Route::get('lectures/View_file/{path}/{file_name}', [App\Http\Controllers\Admin\LectureController::class, 'open_file'])->name('lecture.View_file');
    Route::post('lectures/delete_file/{id}', [App\Http\Controllers\Admin\LectureController::class, 'destroy_file'])->name('lecture.delete_file');
    Route::post('uploadFile', [App\Http\Controllers\Admin\LectureController::class, 'uploadFile'])->name('lecture.uploadFile');
    Route::get('lectures/{id}/students', [App\Http\Controllers\Admin\LectureController::class, 'studentsPresent'])->name('lecture.students_present');
    Route::post('lectures/students/changePresent', [App\Http\Controllers\Admin\LectureController::class, 'changePresentStatus'])->name('lecture.students_change_present_status');
//    Route::get('library/create', [App\Http\Controllers\Admin\LectureController::class, 'create_library'])->name('library.create');
//    Route::post('library/Attachments', [App\Http\Controllers\Admin\LectureController::class, 'attachments_library'])->name('library.Attachments');


    Route::get('tests', [App\Http\Controllers\Admin\TestController::class, 'index'])->name('test.index');
    Route::get('tests/create', [App\Http\Controllers\Admin\TestController::class, 'create'])->name('test.create');
    Route::post('tests/store', [App\Http\Controllers\Admin\TestController::class, 'store'])->name('test.store');
    Route::get('tests/edit/{id}', [App\Http\Controllers\Admin\TestController::class, 'edit'])->name('test.edit');
    Route::post('tests/update/{id}', [App\Http\Controllers\Admin\TestController::class, 'update'])->name('test.update');
    Route::post('tests/delete/{id}', [App\Http\Controllers\Admin\TestController::class, 'destroy'])->name('test.destroy');


    ///schedule/////
    Route::get('schedules', [App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('schedule/create', [App\Http\Controllers\Admin\ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('schedule/store', [App\Http\Controllers\Admin\ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('schedule/edit/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::post('schedule/update/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('schedule.update');

    Route::get('schedule/validate/student/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'validateDate'])->name('lecture.validate.student');
    Route::get('schedule/validate/teacher/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'validateDateTeacher'])->name('lecture.validate.teacher');
    Route::get('schedule/validate/lecture', [App\Http\Controllers\Admin\ScheduleController::class, 'getlectureId']);


    //teachers///
    Route::get('teachers', [App\Http\Controllers\Admin\TeacherController::class, 'index'])->name('teachers.index');
    Route::get('teacher/create', [App\Http\Controllers\Admin\TeacherController::class, 'create'])->name('teacher.create');
    Route::post('teacher/store', [App\Http\Controllers\Admin\TeacherController::class, 'store'])->name('teacher.store');
    Route::get('teacher/edit/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('teacher/update/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'update'])->name('teacher.update');
    Route::post('teacher/delete/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('teacher/show/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'show'])->name('teacher.show');
    Route::post('teacher/changeStatus', [App\Http\Controllers\Admin\TeacherController::class, 'change_status'])->name('teacher.changeStatus');


    //students///
    Route::get('students', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('students.index');
    Route::get('students/create', [App\Http\Controllers\Admin\StudentController::class, 'create'])->name('student.create');
    Route::post('students/store', [App\Http\Controllers\Admin\StudentController::class, 'store'])->name('student.store');
    Route::get('students/edit/{id}', [App\Http\Controllers\Admin\StudentController::class, 'edit'])->name('student.edit');
    Route::post('students/update/{id}', [App\Http\Controllers\Admin\StudentController::class, 'update'])->name('student.update');
    Route::post('students/delete/{id}', [App\Http\Controllers\Admin\StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('students/show/{id}', [App\Http\Controllers\Admin\StudentController::class, 'show'])->name('student.show');
    Route::get('students/registration_request', [App\Http\Controllers\Admin\StudentController::class, 'pending_registration_request'])->name('students.pending_registration_request');
    Route::post('students/registration_request/accept/{id}', [App\Http\Controllers\Admin\StudentController::class, 'acceptStudent'])->name('students.accept');
    Route::post('students/deleteAccount/{id}', [App\Http\Controllers\Admin\StudentController::class, 'destroyStudent'])->name('students.delete.account');
    Route::post('students/changeStatus', [App\Http\Controllers\Admin\StudentController::class, 'change_status'])->name('student.changeStatus');
    Route::post('students/delete/{id}', [App\Http\Controllers\Admin\StudentController::class, 'destroyStudent'])->name('students.delete.account');
    Route::get('student/result/{id}', [App\Http\Controllers\Admin\StudentController::class, 'resultStudent'])->name('student.result');
    Route::get('students/{courseId}', [App\Http\Controllers\Admin\StudentController::class, 'studentsCousres'])->name('students.students.cousres');

    ///blogs///
    Route::get('blogs/records', [App\Http\Controllers\Admin\BlogController::class, 'record'])->name('blogs.records');
    Route::get('blogs', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blogs.index');
    Route::post('blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('blog.destroy');
    Route::post('blog/block/{id}', [App\Http\Controllers\Admin\BlogController::class, 'block'])->name('blog.block');
    Route::get('blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/update/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blog.update');
    Route::post('blog/image', [App\Http\Controllers\Admin\BlogController::class, 'saveImage'])->name('blog.image');
    Route::post('blog/delete_file/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy_file'])->name('blog.delete_file');
    Route::post('blog/delete_comment/{id}', [App\Http\Controllers\Admin\BlogController::class, 'destroy_comment'])->name('blog.delete_comment');
    Route::get('blog/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('blog.create');
    Route::post('blog/store', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blog.store');
    Route::post('blog/accept/{id}', [App\Http\Controllers\Admin\BlogController::class, 'accept'])->name('blog.accept');
    Route::post('blog/reject/{id}', [App\Http\Controllers\Admin\BlogController::class, 'reject'])->name('blog.reject');

    Route::get('tests', [App\Http\Controllers\Admin\TestController::class, 'index'])->name('test.index');
    Route::get('tests/create', [App\Http\Controllers\Admin\TestController::class, 'create'])->name('test.create');
    Route::post('tests/store', [App\Http\Controllers\Admin\TestController::class, 'store'])->name('test.store');
    Route::get('tests/edit/{id}', [App\Http\Controllers\Admin\TestController::class, 'edit'])->name('test.edit');
    Route::post('tests/update/{id}', [App\Http\Controllers\Admin\TestController::class, 'update'])->name('test.update');
    Route::get('tests/show/{id}', [App\Http\Controllers\Admin\TestController::class, 'show'])->name('test.show');
    Route::post('tests/delete/{id}', [App\Http\Controllers\Admin\TestController::class, 'destroy'])->name('test.destroy');
    Route::get('tests/{id}/questions', [App\Http\Controllers\Admin\TestController::class, 'testQuestions'])->name('test.questions');
    Route::get('tests/{id}/students', [App\Http\Controllers\Admin\TestController::class, 'testStudents'])->name('test.students');
    Route::get('tests/{id}/students/{stud_id}/answers', [App\Http\Controllers\Admin\TestController::class, 'testStudentsAnswers'])->name('test.students.answers');
    Route::post('tests/{id}/students/{stud_id}/answers', [App\Http\Controllers\Admin\TestController::class, 'correctStudentsAnswers'])->name('test.students.correctAnswers');



    Route::get('tests/{id}/questions/create', [App\Http\Controllers\Admin\QuestionController::class, 'create'])->name('test.question.create');
    Route::post('tests/{id}/questions/store', [App\Http\Controllers\Admin\QuestionController::class, 'store'])->name('test.question.store');
    Route::get('questions/edit/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'edit'])->name('question.edit');
    Route::post('questions/update/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'update'])->name('question.update');
    Route::post('questions/delete/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'destroy'])->name('question.destroy');

    ///test///
    Route::get('tests', [App\Http\Controllers\Admin\TestController::class, 'index'])->name('test.index');
    Route::get('tests/create', [App\Http\Controllers\Admin\TestController::class, 'create'])->name('test.create');
    Route::post('tests/store', [App\Http\Controllers\Admin\TestController::class, 'store'])->name('test.store');
    Route::get('tests/edit/{id}', [App\Http\Controllers\Admin\TestController::class, 'edit'])->name('test.edit');
    Route::post('tests/update/{id}', [App\Http\Controllers\Admin\TestController::class, 'update'])->name('test.update');
    Route::get('tests/show/{id}', [App\Http\Controllers\Admin\TestController::class, 'show'])->name('test.show');
    Route::post('tests/delete/{id}', [App\Http\Controllers\Admin\TestController::class, 'destroy'])->name('test.destroy');
    Route::get('tests/{id}/questions', [App\Http\Controllers\Admin\TestController::class, 'testQuestions'])->name('test.questions');
    Route::get('tests/{id}/students', [App\Http\Controllers\Admin\TestController::class, 'testStudents'])->name('test.students');
    Route::get('tests/{id}/students/{stud_id}/answers', [App\Http\Controllers\Admin\TestController::class, 'testStudentsAnswers'])->name('test.students.answers');
    Route::post('tests/{id}/students/{stud_id}/answers', [App\Http\Controllers\Admin\TestController::class, 'correctStudentsAnswers'])->name('test.students.correctAnswers');



    Route::get('tests/{id}/questions/create', [App\Http\Controllers\Admin\QuestionController::class, 'create'])->name('test.question.create');
    Route::post('tests/{id}/questions/store', [App\Http\Controllers\Admin\QuestionController::class, 'store'])->name('test.question.store');
    Route::get('questions/edit/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'edit'])->name('question.edit');
    Route::post('questions/update/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'update'])->name('question.update');
    Route::post('questions/delete/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'destroy'])->name('question.destroy');


    Route::get('surveys', [App\Http\Controllers\Admin\SurveyController::class, 'index'])->name('survey.index');
    Route::get('surveys/create', [App\Http\Controllers\Admin\SurveyController::class, 'create'])->name('survey.create');
    Route::post('surveys/store', [App\Http\Controllers\Admin\SurveyController::class, 'store'])->name('survey.store');
    Route::get('surveys/edit/{id}', [App\Http\Controllers\Admin\SurveyController::class, 'edit'])->name('survey.edit');
    Route::post('surveys/update/{id}', [App\Http\Controllers\Admin\SurveyController::class, 'update'])->name('survey.update');
    Route::get('surveys/show/{id}', [App\Http\Controllers\Admin\SurveyController::class, 'show'])->name('survey.show');
    Route::post('surveys/delete/{id}', [App\Http\Controllers\Admin\SurveyController::class, 'destroy'])->name('survey.destroy');
    Route::get('surveys/{id}/questions', [App\Http\Controllers\Admin\SurveyController::class, 'surveyQuestions'])->name('survey.questions');
    Route::get('surveys/{id}/students', [App\Http\Controllers\Admin\SurveyController::class, 'surveyStudents'])->name('survey.students');
    Route::get('surveys/{id}/students/{stud_id}/answers', [App\Http\Controllers\Admin\SurveyController::class, 'surveyStudentsAnswers'])->name('survey.students.answers');



    Route::get('surveys/{id}/questions/create', [App\Http\Controllers\Admin\SurveyQuestionController::class, 'create'])->name('survey.question.create');
    Route::post('surveys/{id}/questions/store', [App\Http\Controllers\Admin\SurveyQuestionController::class, 'store'])->name('survey.question.store');
    Route::get('surveys/questions/edit/{id}', [App\Http\Controllers\Admin\SurveyQuestionController::class, 'edit'])->name('survey.question.edit');
    Route::post('surveys/questions/update/{id}', [App\Http\Controllers\Admin\SurveyQuestionController::class, 'update'])->name('survey.question.update');
    Route::post('surveys/questions/delete/{id}', [App\Http\Controllers\Admin\SurveyQuestionController::class, 'destroy'])->name('survey.question.destroy');


    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings');
    Route::post('updateSettingAbout', [App\Http\Controllers\Admin\SettingController::class, 'updateAbout'])->name('settings.about.update');
    Route::post('updateSettingContact', [App\Http\Controllers\Admin\SettingController::class, 'updateContacts'])->name('settings.contact.update');
    Route::post('updateSettingImages', [App\Http\Controllers\Admin\SettingController::class, 'updateImages'])->name('settings.images.update');

    Route::get('my-notifications', [NotificationController::class, 'getNotificationsForAdmin'])->name('admin-my-notifications');
    Route::get('unread-notification-num', [NotificationController::class, 'getNumOfUnReadNotification'])->name('admin-ajax-unread-notification-num');
    Route::get('show-notification-brief', [NotificationController::class, 'getNotificationsBriefly'])->name('admin-ajax-get-notification-brief');


    // library
    Route::get('library', [App\Http\Controllers\Admin\LibraryController::class, 'index'])->name('library.index');
    Route::get('library/create', [App\Http\Controllers\Admin\LibraryController::class, 'create'])->name('library.create');
    Route::post('library/store', [App\Http\Controllers\Admin\LibraryController::class, 'store'])->name('library.store');
    Route::get('library/edit/{id}', [App\Http\Controllers\Admin\LibraryController::class, 'edit'])->name('library.edit');
    Route::post('library/update/{id}', [App\Http\Controllers\Admin\LibraryController::class, 'update'])->name('library.update');
    Route::post('library/delete/{id}', [App\Http\Controllers\Admin\LibraryController::class, 'destroy'])->name('library.destroy');

    Route::get('calendar/index', [\App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
    Route::post('calendar', [\App\Http\Controllers\CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('calendar/update/{id}', [\App\Http\Controllers\CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [\App\Http\Controllers\CalendarController::class, 'destroy'])->name('calendar.destroy');
    Route::get('full_calender', [\App\Http\Controllers\Admin\FullCalenderController::class, 'index']);

    Route::post('full_calender/action', [\App\Http\Controllers\Admin\FullCalenderController::class, 'action']);

});

Route::group(['middleware' => ['guest:admin', 'localization']], function () {
    Route::get('admin/login', [App\Http\Controllers\Admin\LoginController::class, 'getLogin'])->name('admin.getLogin');
    Route::post('admin/login',  [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');

});
