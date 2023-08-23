<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\General;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\ICourseStudentRepository;
use App\Http\IRepositories\IDiplomaRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Http\IRepositories\IUserRepository;
use App\Models\Course;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Sabberworm\CSS\Value\URL;

class HomeController extends Controller
{
    protected $courseRepository;
    protected $userRepository;
    protected $studentRepository;
    protected $diplomaRepository;
    protected $courseStudentRepository;
    protected $requestData;

    //
    public function __construct(IUserRepository $userRepository,
                                IStudentRepository $studentRepository,
                                IDiplomaRepository $diplomaRepository,
                                ICourseRepository $courseRepository,
                                ICourseStudentRepository $courseStudentRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
        $this->studentRepository = $studentRepository;
        $this->diplomaRepository = $diplomaRepository;
        $this->courseStudentRepository = $courseStudentRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {


            $students_num = count($this->studentRepository->getStudentByStatus(1));
            $pending_students_num = count($this->studentRepository->getStudentByStatus(0));
            $users_num = count($this->userRepository->getUsersByRole(1));
            $teachers_num = count($this->userRepository->getUsersByRole(2));
            $course_num = count($this->courseRepository->all());
            $diplomas_num = count($this->diplomaRepository->all());
            $course_request_num= count($this->courseStudentRepository->getSubscriptionsByStatus(0));


            $pending_students_request = $this->studentRepository->getStudentByStatus(0)->take(5);
            $pending_courses_request = $this->courseStudentRepository->getSubscriptionsByStatus(0)->take(5);



            return view('admin.home', compact('students_num',
                'pending_students_num', 'users_num', 'teachers_num',
                'course_num', 'diplomas_num' , 'course_request_num',
            'pending_students_request', 'pending_courses_request'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
