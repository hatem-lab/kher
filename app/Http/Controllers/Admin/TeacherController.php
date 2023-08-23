<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\IRepositories\ITeacherRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class TeacherController extends Controller
{

    protected $teacherRepository;
    protected $userRepository;
    protected $requestData;

    public function __construct(ITeacherRepository $teacherRepository, IUserRepository $userRepository)
    {
        $this->teacherRepository = $teacherRepository;
        $this->userRepository = $userRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

        $this->middleware('permission:teachers');
        $this->middleware('permission:list teachers')->only(['index']);
        $this->middleware('permission:create teacher')->only(['create']);
        $this->middleware('permission:update teacher')->only(['edit']);
        $this->middleware('permission:show teacher')->only(['show']);
        $this->middleware('permission:delete teacher')->only(['destroy']);
        $this->middleware('permission:block-activate teacher')->only(['change_status']);
    }

    public function index(Request $request)
    {
        return $this->teacherRepository->getAllTeachers($request);
    }

    public function show($id)
    {
        $user = $this->userRepository->showUser($id);
        return view('admin.teachers.show', compact('user'));
    }

    public function edit($id)
    {
        $data = $this->userRepository->editUser($id);
        return view('admin.teachers.edit', $data);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        if (!empty($input['password'])) {
            $validator = Validator::make($input, [
                'password' => 'required|min:6',
                'confirm-password' => 'required_with:password|same:password'
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator);
            }

            if ($validator->passes()) {

                $input['password'] = Hash::make($input['password']);
                $user->update($input);
                DB::table('model_has_roles')->where('model_id', $id)->delete();
                $user->assignRole($request->input('roles'));
            }

        } else {
            $input['password'] = $user->password;
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('teachers.index')
            ->with('edit', 'User information has updated successfully');

    }

//    public function destroy($id)
//    {
//         $this->userRepository->deleteUser($id);
//        return redirect()->route('teachers.index')->with('delete','Teacher has Deleted Successfully');
//    }

    public function destroy($id)
    {
        try {

            $this->teacherRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

//        $this->studentRepository->deleteStudent($req);
//        return redirect()->route('students.index')->with('delete','Student has Deleted Successfully');
    }


    public function create()
    {
//        $certificate = $this->userRepository->createUser();
//        return view('admin.students.create', compact('certificate'));
        return $this->userRepository->createUser();
    }


    public function change_status()
    {
        //
        try {

            $id = $this->requestData['teacher_id'];
            $teacher = $this->teacherRepository->find($id);
            $status = $teacher->status;

            if ($status == 1) {
                $data['status'] = 2;
                $msg = trans('Teachers/Teachers.Teacher_Blocked_Successfully');
            } else {
                $data['status'] = 1;
                $msg = trans('Teachers/Teachers.Teacher_Activated_Successfully');
            }
            $validator_rules = [
                'status' => 'required'
            ];

            $validator = Validator::make($data, $validator_rules);

            if ($validator->passes()) {


                $course = $this->teacherRepository->update($data, $id);


                return redirect()->route('teachers.index')->with('message', $msg);

            }
            return redirect()->route('teachers.index')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $ex) {
            return redirect()->route('teachers.index')->with('error', $ex->getMessage());

        }


    }

}
