<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICourseRepository;
use App\Http\IRepositories\ILectureRepository;
use App\Models\Course;
use App\Models\File;
use App\Models\Homework;
use App\Models\Lecture;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Test;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        try {

           $user=User::where('id',auth('admin') -> user() ->id)->first();
           return view('admin.profile.profile',compact('user'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        try {


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        if(!empty($input['password'])){
            $validator = Validator::make($input, [
                'password' => 'required|min:6',
                'confirm_password' =>'required_with:password|same:password'
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator);
            }

            if($validator->passes()) {
                $input['password'] = Hash::make($input['password']);
            }

        }else{
            $input['password']=$user->password;
            $user->update($input);
            $profile=$user->profile;
            if($profile)
            {
                $image = $request->file('file');
                if($image)
                {
                    $file_name = $image->getClientOriginalName();
                    $profile->update([
                        'image'=>$file_name,
                    ]);
                    $imageName = $request->file->getClientOriginalName();
                    $request->file->move(public_path('Profile/' . $request->name), $imageName);
                }
                $profile->update([
                    'phone'=>$request->phone,
                    'birthday'=>$request->birthday,
                    'address'=>$request->address,
                ]);
            }
            else
            {
                $image = $request->file('file');
                if($image)
                {
                    $file_name = $image->getClientOriginalName();

                    $imageName = $request->file->getClientOriginalName();
                    $request->file->move(public_path('Profile/' . $request->name), $imageName);
                }else{
                    $file_name=null;
                }

                Profile::create([
                    'phone'=>$request->phone,
                    'birthday'=>$request->birthday,
                    'address'=>$request->address,
                    'image'=>$file_name,
                    'user_id'=>auth('admin')->user()->id,
                ]);
            }






        }
        return redirect()->route('admin.profile')
            ->with('edit','User information has updated successfully');
    }








}
