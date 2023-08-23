<?php

namespace App\Helpers;

use App\Models\Language;
use App\Models\Lecture;
use App\Models\LectureStudent;
use App\Models\Student;
use App\Models\StudentFile;
use App\Models\StudentTest;
use Illuminate\Support\Facades\Config;
use app\Helpers;
use Spatie\Permission\Models\Permission;

class General
{
    function get_languages()
    {

        return Language::active()->Selection()->get();
    }

    function get_default_lang()
    {
        return Config::get('app.locale');
    }


    public static function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = 'images/' . $folder . '/' . $filename;
        return $path;
    }

    public static function roleUser($role)
    {

        if ($role == 1) {
            return 'super admin';
        }
        elseif ($role == 2)
        {
            return 'teacher';
        }
        elseif ($role == 3)
        {
            return 'admin';
        }
        elseif ($role == 4)
        {
            return 'publisher';
        }
    }

    public static function studentPresent($course,$student_id)
    {
        $lecture_student_present_array=[];
        $lectures=$course->lectures;
        $lectures_present_count=Lecture::where('course_id',$course->id)->count();
        foreach ($lectures as $lecture)
        {
            if (LectureStudent::where('lecture_id', $lecture->id)->where('student_id', $student_id)->first()) {
                $lecture_student_present_array[] = LectureStudent::where('lecture_id', $lecture->id)->where('student_id', $student_id)->pluck('id');
            }
        }
        if ($lectures_present_count != 0)
        {
            $student_present_lecture=(count($lecture_student_present_array)*100)/$lectures_present_count;
        }else{
            $student_present_lecture=0;
        }

       return $student_present_lecture;
    }
    public static function studentResult($course,$student_id)
    {
        $student=Student::find($student_id);
        $student_files=$student->studentFiles;
        $tests=$course->tests;
        $lectures_present_count=Lecture::where('course_id',$course->id)->count();
        $lectures=$course->lectures;
        $homeworks=$course->homeworks;
        $tests_mark_array=[];
        $tests_weight=0;
        $tests_mark=0;
        $homeworks_mark_array=[];
        $lecture_student_present_array=[];
        $homeworks_mark=0;
            foreach ($tests as $test)
            {
                if (StudentTest::where('test_id',$test->id)->where('student_id',$student_id)->first())
                {
                    $tests_mark_array[]=StudentTest::where('test_id',$test->id)->where('student_id',$student_id)->pluck('total_mark');
                    $tests_weight+=$test->weight;
                    $tests_mark+=StudentTest::where('test_id',$test->id)->where('student_id',$student_id)->first()->total_mark * $test->weight;

                }
        }

        if($tests_weight !=0)
        {
            $average_test=$tests_mark/$tests_weight;
        }else{
            $average_test=0;
        }
        foreach ($homeworks as $homework)
        {
            if($homework_mark=StudentFile::where('homework_id',$homework->id)->where('student_id',$student_id)->first())
            {
                $homeworks_mark_array[]=StudentFile::where('homework_id',$homework->id)->where('student_id',$student_id)->pluck('mark');
                $homeworks_mark+=$homework_mark->mark;
            }
        }
        foreach ($lectures as $lecture)
        {

            if(LectureStudent::where('lecture_id',$lecture->id)->where('student_id',$student_id)->first())
            {
                $lecture_student_present_array[]=LectureStudent::where('lecture_id',$lecture->id)->where('student_id',$student_id)->pluck('id');

            }
        }
        if($lectures_present_count !=0)
        {
            $student_present_lecture=(count($lecture_student_present_array)*100)/$lectures_present_count;

        }
        else
        {
            $student_present_lecture=0;
        }
        if(count($homeworks_mark_array) !=0)
        {
            $average_homeworks=$homeworks_mark/count($homeworks_mark_array);
        }else
        {
            $average_homeworks=0;
        }

        $result=($average_test*$course->testPercentage/100) +($average_homeworks*$course->homeworkPercentage/100) + ($student_present_lecture*$course->presencePercentage/100 );
        return $result;
    }

    public static function resultStudentText($course,$student_id)
    {
       if(General::studentResult($course,$student_id) >=60)
       {
           return 'ناجح';
       }
       elseif (General::studentResult($course,$student_id) <60 )
       {
           return 'راسب';
       }
    }

    public static function getDiplomaStatus($diploma)
    {
        if(\App\Models\Course::where('diploma_id',$diploma->id)->where('is_finished',1)->get()->count() == \App\Models\Course::where('diploma_id',$diploma->id)->get()->count())
        {
            return true;
        }
        else
            return false;
    }



    public static function getPermissionsRole($role_id)
    {
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$role_id)
            ->get();
        return $rolePermissions;
    }


    function uploadVideo($folder, $video)
    {
        $video->store('/', $folder);
        $filename = $video->hashName();
        $path = 'video/' . $folder . '/' . $filename;
        return $path;
    }
}


