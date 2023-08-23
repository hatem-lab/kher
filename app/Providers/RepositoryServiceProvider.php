<?php

namespace App\Providers;

use App\Http\IRepositories\IAnswerRepository;
use App\Http\IRepositories\IBlogRepository;
use App\Http\IRepositories\ICertificateRepository;
use App\Http\IRepositories\ICommentRepository;
use App\Http\IRepositories\IContactRepository;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\ICourseStudentRepository;
use App\Http\IRepositories\ILibraryRepository;
use App\Http\IRepositories\IStudentCourseRegistrationRequestRepository;
use App\Http\IRepositories\IDiplomaRepository;
use App\Http\IRepositories\IFileRepository;
use App\Http\IRepositories\IHomeworkRepository;
use App\Http\IRepositories\ILectureRepository;
use App\Http\IRepositories\ILoginRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IOptionRepository;
use App\Http\IRepositories\IProfileRepository;
use App\Http\IRepositories\IProgressRepository;
use App\Http\IRepositories\IQuestionRepository;
use App\Http\IRepositories\IQuestionTypeRepository;
use App\Http\IRepositories\IRoleRepository;
use App\Http\IRepositories\IScheduleRepository;
use App\Http\IRepositories\ISettingImageRepository;
use App\Http\IRepositories\ISettingRepository;
use App\Http\IRepositories\IStudentFileRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\ISurveyAnswerRepository;
use App\Http\IRepositories\ISurveyOptionRepository;
use App\Http\IRepositories\ISurveyQuestionRepository;
use App\Http\IRepositories\ISurveyRepository;
use App\Http\IRepositories\ITeacherRepository;
use App\Http\IRepositories\ITestRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Repository\AnswerRepository;
use App\Http\Repository\BlogRepository;
use App\Http\Repository\CertificateRepository;
use App\Http\Repository\CommentRepository;
use App\Http\Repository\ContactRepository;
use App\Http\Repository\CourseRepository;
use App\Http\Repository\CourseStudentRepository;
use App\Http\Repository\DiplomaRepository;
use App\Http\Repository\FileRepository;
use App\Http\Repository\HomeworkRepository;
use App\Http\Repository\LectureRepository;
use App\Http\Repository\LibraryRepository;
use App\Http\Repository\LoginRepository;
use App\Http\Repository\NotificationRepository;
use App\Http\Repository\OptionRepository;
use App\Http\Repository\ProfileRepository;
use App\Http\Repository\ProgressRepository;
use App\Http\Repository\QuestionRepository;
use App\Http\Repository\QuestionTypeRepository;
use App\Http\Repository\RoleRepository;
use App\Http\Repository\ScheduleRepository;
use App\Http\Repository\SettingImageRepository;
use App\Http\Repository\SettingRepository;
use App\Http\Repository\StudentFileRepository;
use App\Http\Repository\StudentRepository;
use App\Http\Repository\SurveyAnswerRepository;
use App\Http\Repository\SurveyOptionRepository;
use App\Http\Repository\SurveyQuestionRepository;
use App\Http\Repository\SurveyRepository;
use App\Http\Repository\TeacherRepository;
use App\Http\Repository\TestRepository;
use App\Http\Repository\UserRepository;
use App\Http\Repository\StudentCourseRegistrationRequestRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IAnswerRepository::class, AnswerRepository::class);
        $this->app->bind(IBlogRepository::class, BlogRepository::class);
        $this->app->bind(ICertificateRepository::class, CertificateRepository::class);
        $this->app->bind(ICommentRepository::class, CommentRepository::class);
        $this->app->bind(IContactRepository::class, ContactRepository::class);
        $this->app->bind(ICourseRepository::class, CourseRepository::class);
        $this->app->bind(IDiplomaRepository::class, DiplomaRepository::class);
        $this->app->bind(IFileRepository::class, FileRepository::class);
        $this->app->bind(IHomeworkRepository::class, HomeworkRepository::class);
        $this->app->bind(ILectureRepository::class, LectureRepository::class);
        $this->app->bind(IOptionRepository::class, OptionRepository::class);
        $this->app->bind(IProfileRepository::class, ProfileRepository::class);
        $this->app->bind(IProgressRepository::class, ProgressRepository::class);
        $this->app->bind(IQuestionRepository::class, QuestionRepository::class);
        $this->app->bind(IQuestionTypeRepository::class, QuestionTypeRepository::class);
        $this->app->bind(IScheduleRepository::class, ScheduleRepository::class);
        $this->app->bind(ISettingImageRepository::class, SettingImageRepository::class);
        $this->app->bind(ISettingRepository::class, SettingRepository::class);
        $this->app->bind(IStudentRepository::class, StudentRepository::class);
        $this->app->bind(IStudentFileRepository::class, StudentFileRepository::class);
        $this->app->bind(ITestRepository::class, TestRepository::class);
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
        $this->app->bind(ILoginRepository::class, LoginRepository::class);
        $this->app->bind(ITeacherRepository::class, TeacherRepository::class);
        $this->app->bind(ISurveyRepository::class, SurveyRepository::class);
        $this->app->bind(ISurveyQuestionRepository::class, SurveyQuestionRepository::class);
        $this->app->bind(ISurveyAnswerRepository::class, SurveyAnswerRepository::class);
        $this->app->bind(ISurveyOptionRepository::class, SurveyOptionRepository::class);
        $this->app->bind(ICourseStudentRepository::class, CourseStudentRepository::class);
        $this->app->bind(IStudentCourseRegistrationRequestRepository::class, StudentCourseRegistrationRequestRepository::class);
        $this->app->bind(INotificationRepository::class, NotificationRepository::class);
        $this->app->bind(ILibraryRepository::class, LibraryRepository::class);


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
