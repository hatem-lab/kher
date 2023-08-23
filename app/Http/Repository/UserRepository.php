<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\IUserRepository;
use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository extends BaseRepository implements IUserRepository
{

    public function model()
    {
        return User::class;
    }

    public function getAllUsers($request)
    {
        $data = User::orderBy('id','ASC')->get();
        return view('admin.users.show_users',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function createUser()
    {
        $roles = Role::pluck('name','name')->all();

        return view('admin.users.Add_user',compact('roles'));
    }

    public function storeUser($request)
    {
        $input = $request->all();

        if(isset($input['is_teacher']) && $input['is_teacher'] == "on"){
            $input['role'] = 2; // teacher
        }else{
            $input['role'] = 1; // admin

        }

        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $profile=new Profile();
        $profile->create([
            'user_id'=>$user->id
        ]);


        $user->assignRole($request->input('roles_name'));
        return redirect()->route('users.index')
            ->with('success','User has Added Successfully');
    }



    public function showUser($id)
    {
       return  User::find($id);

    }


    public function editUser($id)
    {
        $data['user'] = User::find($id);
        $data['roles'] = Role::pluck('name','name')->all();
        $data['userRole'] =$data['user']->roles->pluck('name','name')->all();

        return $data;

    }
    public function updateUser($request, $id)
    {
        $user = User::find($id);
        $input = $request->all();

        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password']=$user->password;
        }
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));


    }

    public function deleteUser($id)
    {
       return User::find($id)->delete();

    }

    public function getUsersByRole($role)
    {
        try {
            $users= $this->model->where('role', $role)
                ->get();

            return $users;
        } catch (Exception $exception) {
            throw new Exception('common_msg.' . trans($exception->getMessage()));
        }
    }

}
