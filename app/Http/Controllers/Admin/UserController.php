<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
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

class UserController extends Controller
{

    protected $userRepository;
    protected $requestData;

    public function __construct(IUserRepository  $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());


        $this->middleware('permission:list users')->only(['index']);
        $this->middleware('permission:create user')->only(['create']);
        $this->middleware('permission:update user')->only(['edit']);
        $this->middleware('permission:show user')->only(['show']);
        $this->middleware('permission:delete user')->only(['destroy']);
        $this->middleware('permission:block-activate user')->only(['change_status']);
    }

    public function index(Request $request)
    {
        return $this->userRepository->getAllUsers($request);
    }


    public function create()
    {
        return $this->userRepository->createUser();
    }


    public function store(UserRequest $request)
    {
        return $this->userRepository->storeUser($request);

    }

    public function show($id)
    {

        $user = $this->userRepository->showUser($id);
        return view('admin.users.show',compact('user'));
    }

    public function edit($id)
    {
        $data= $this->userRepository->editUser($id);
        return view('admin.users.edit',$data);

    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();


        if(isset($input['is_teacher']) && $input['is_teacher'] == "on"){
            $input['role'] = 2; // teacher
        }else{
            $input['role'] = 1; // admin

        }
        if(!empty($input['password']))
        {
            $validator = Validator::make($input, [
                'password' => 'required|min:6',
                'confirm-password' =>'required_with:password|same:password'
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator);
            }

            if($validator->passes()) {

                $input['password'] = Hash::make($input['password']);
                $user->update($input);
                DB::table('model_has_roles')->where('model_id',$id)->delete();
                $user->assignRole($request->input('roles'));
            }

        }else{
            $input['password']=$user->password;
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
        }



        return redirect()->route('users.index')
            ->with('edit','User information has updated successfully');
    }

//    public function destroy($id)
//    {
//         $this->userRepository->deleteUser($id);
//        return redirect()->route('users.index')->with('delete','User has Deleted Successfully');
//    }

    public function destroy($id)
    {
        try {

            $this->userRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }

    public function change_status()
    {
        //
        try {

            $id = $this->requestData['user_id'];
            $user = $this->userRepository->find($id);
            $status = $user->status;

            if($status == 1){
                $data['status'] = 2;
                $msg = trans('Users/user.User_Blocked_Successfully');
            }else{
                $data['status'] = 1;
                $msg = trans('Users/user.User_Activated_Successfully');
            }
            $validator_rules = [
                'status' => 'required'
            ];

            $validator = Validator::make($data, $validator_rules);

            if ($validator->passes()) {


                $course = $this->userRepository->update($data, $id);


                return redirect()->route('users.index')->with('message', $msg);

            }
            return redirect()->route('users.index')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $ex) {
            return redirect()->route('users.index')->with('error', $ex->getMessage());

        }


    }

}
