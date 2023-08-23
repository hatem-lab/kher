<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Model::unguard();

        DB::table('notifications')->insert([
            [

                'id' => 1,
                'user_type' => 'user',
                'type' => 'new_subscription',
                'fcm_message_en' => 'new_subscription 1 message en',
                'fcm_title_en' => 'new_subscription 1 title en',
                'fcm_message_ar' => 'new_subscription 1 message ar',
                'fcm_title_ar' => 'new_subscription 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'course_id' => 1,
                        'student_id' => 2,
                    ]
                ),
                'user_id' => 1,
                'student_id' => null,
                'status' => 0
            ],
            [
                'id' => 2,
                'user_type' => 'user',
                'type' => 'new_comment',
                'fcm_message_en' => 'new_comment 1 message en',
                'fcm_title_en' => 'new_comment 1 title en',
                'fcm_message_ar' => 'new_comment 1 message ar',
                'fcm_title_ar' => 'new_comment 1 title ar',
                'fcm_data' =>json_encode(
                    [
                        'blog_id' => 1,
                        'student_id' => 2,
                    ]
                ),
                'user_id' => 1,
                'student_id' => null,
                'status' => 0
            ],
            [
                'id' => 3,
                'user_type' => 'user',
                'type' => 'new_register',
                'fcm_message_en' => 'new_register 1 message en',
                'fcm_title_en' => 'new_register 1 title en',
                'fcm_message_ar' => 'new_register 1 message ar',
                'fcm_title_ar' => 'new_register 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'student_id' => 3,

                    ]
                ),
                'user_id' => 1,
                'student_id' => null,
                'status' => 0

            ],
            [
                'id' => 4,
                'user_type' => 'student',
                'type' => 'subscription_status',
                'fcm_message_en' => 'subscription_status 1 message en',
                'fcm_title_en' => 'subscription_status 1 title en',
                'fcm_message_ar' => 'subscription_status 1 message ar',
                'fcm_title_ar' => 'subscription_status 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'subscription_status' => 1,
                        'course_id' => 2,
                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],
            [
                'id' => 5,
                'user_type' => 'student',
                'type' => 'test_mark',
                'fcm_message_en' => 'test_mark 1 message en',
                'fcm_title_en' => 'test_mark 1 title en',
                'fcm_message_ar' => 'test_mark 1 message ar',
                'fcm_title_ar' => 'test_mark 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'test_id' => 1,
                        'mark' => 50,
                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],
            [
                'id' => 6,
                'user_type' => 'user',
                'type' => 'apply_test',
                'fcm_message_en' => 'apply test 1 message en',
                'fcm_title_en' => 'apply test 1 title en',
                'fcm_message_ar' => 'apply test 1 message ar',
                'fcm_title_ar' => 'apply test 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'student_id' => 1,
                        'test_id' => 1,
                    ]
                ),
                'user_id' => 1,
                'student_id' => null,
                'status' => 0
            ],
            [
                'id' => 7,
                'user_type' => 'student',
                'type' => 'new_diploma',
                'fcm_message_en' => 'new_diploma 1 message en',
                'fcm_title_en' => 'new_diploma 1 title en',
                'fcm_message_ar' => 'new_diploma 1 message ar',
                'fcm_title_ar' => 'new_diploma 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'diploma_id' => 1,

                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],
            [
                'id' => 8,
                'user_type' => 'student',
                'type' => 'new_course',
                'fcm_message_en' => 'new_course 1 message en',
                'fcm_title_en' => 'new_course 1 title en',
                'fcm_message_ar' => 'new_course 1 message ar',
                'fcm_title_ar' => 'new_course 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'course_id' => 1,

                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],
            [
                'id' => 9,
                'user_type' => 'student',
                'type' => 'new_lecture',
                'fcm_message_en' => 'new_lecture 1 message en',
                'fcm_title_en' => 'new_lecture 1 title en',
                'fcm_message_ar' => 'new_lecture 1 message ar',
                'fcm_title_ar' => 'new_lecture 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'lecture_id' => 1,

                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],

            [
                'id' => 10,
                'user_type' => 'student',
                'type' => 'new_test',
                'fcm_message_en' => 'new_test 1 message en',
                'fcm_title_en' => 'new_test 1 title en',
                'fcm_message_ar' => 'new_test 1 message ar',
                'fcm_title_ar' => 'new_test 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'test_id' => 1,

                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],
            [
                'id' => 11,
                'user_type' => 'student',
                'type' => 'new_homework',
                'fcm_message_en' => 'new_homework 1 message en',
                'fcm_title_en' => 'new_homework 1 title en',
                'fcm_message_ar' => 'new_homework 1 message ar',
                'fcm_title_ar' => 'new_homework 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'homework_id' => 1,

                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],
            [
                'id' => 12,
                'user_type' => 'student',
                'type' => 'homework_mark',
                'fcm_message_en' => 'homework_mark 1 message en',
                'fcm_title_en' => 'homework_mark 1 title en',
                'fcm_message_ar' => 'homework_mark 1 message ar',
                'fcm_title_ar' => 'homework_mark 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'homework_id' => 1,
                        'mark' => 50,
                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],

            [
                'id' => 13,
                'user_type' => 'student',
                'type' => 'new_survey',
                'fcm_message_en' => 'new_survey 1 message en',
                'fcm_title_en' => 'new_survey 1 title en',
                'fcm_message_ar' => 'new_survey 1 message ar',
                'fcm_title_ar' => 'new_survey 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'survey_id' => 1,
                    ]
                ),
                'user_id' => null,
                'student_id' => 1,
                'status' => 0
            ],
            [
                'id' => 14,
                'user_type' => 'user',
                'type' => 'student_homework',
                'fcm_message_en' => 'student_homework 1 message en',
                'fcm_title_en' => 'student_homework 1 title en',
                'fcm_message_ar' => 'student_homework 1 message ar',
                'fcm_title_ar' => 'student_homework 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'homework_id' => 1,
                        'student_id' => 1

                    ]
                ),
                'user_id' => 2,
                'student_id' => null,
                'status' => 0
            ],
            [
                'id' => 15,
                'user_type' => 'user',
                'type' => 'apply_survey',
                'fcm_message_en' => 'apply_survey 1 message en',
                'fcm_title_en' => 'apply_survey 1 title en',
                'fcm_message_ar' => 'apply_survey 1 message ar',
                'fcm_title_ar' => 'apply_survey 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'survey_id' => 1,
                        'student_id' => 1

                    ]
                ),
                'user_id' => 2,
                'student_id' => null,
                'status' => 0
            ],
            [
                'id' => 16,
                'user_type' => 'user',
                'type' => 'certificate_request',
                'fcm_message_en' => 'certification_request 1 message en',
                'fcm_title_en' => 'certification_request 1 title en',
                'fcm_message_ar' => 'certification_request 1 message ar',
                'fcm_title_ar' => 'certification_request 1 title ar',
                'fcm_data' => json_encode(
                    [
                        'diploma_id' => 1,
                        'student_id' => 1

                    ]
                ),
                'user_id' => 2,
                'student_id' => null,
                'status' => 0
            ],


        ]);

    }
}
