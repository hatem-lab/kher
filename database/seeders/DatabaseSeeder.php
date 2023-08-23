<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CertificateSeeder::class,
            DiplomaSeeder::class,
            StudentSeeder::class,
            ProfileSeeder::class,
            CourseSeeder::class,
            CourseStudentSeeder::class,
            CourseUserSeeder::class,
            LectureSeeder::class,
            LectureStudentSeeder::class,
            HomeworkSeeder::class,
            HomeworkStudentSeeder::class,
//            FileSeeder::class,
            //StudentFilesSeeder::class,
            TestSeeder::class,
            StudentTestSeeder::class,
            QuestionTypeSeeder::class,
            QuestionSeeder::class,
            OptionSeeder::class,
            AnswerSeeder::class,
            ProgressSeeder::class,
            ScheduleSeeder::class,
            BlogSeeder::class,
            CommentSeeder::class,
            SettingSeeder::class,
            SettingImageSeeder::class,
            ContactSeeder::class,
            SurveySeeder::class,
            StudentSurveySeeder::class,
            SurveyQuestionSeeder::class,
            SurveyOptionSeeder::class,
            SurveyAnswerSeeder::class,
            RoleSeeder::class,
            PermissionTableSeeder::class,
            RolelHasPermissionsSeeder::class,
            ModelHasRoleSeeder::class,
            NotificationSeeder::class,
            LibrarySeeder::class,
        ]);
    }
}
