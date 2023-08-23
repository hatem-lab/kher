<?php


namespace App\Helpers;


class Constants
{
    const NULL = "null";
    const NOT_NULL = "not null";
    const DESIGNER = "designer";
    const CLIENT = "client";
    const SUPERVISOR = "superVisor";
    const LIST_MODIFICATIONS = 'list modifications';
    const CONV_CAMEL = 'camel';
    const CONV_UNDERSCORE = 'underscore';
    const ORDER_BY = "order_by";
    const ORDER_By_DIRECTION = "order_by_direction";
    const FILTER_OPERATOR = "filter_operator";
    const FILTERS = "filters";
    const PER_PAGE = "per_page";

    const NEW_DIPLOMA_TITLE_EN = "New Diploma";
    const NEW_DIPLOMA_TITLE_AR = "دبلوم جديد";
    const NEW_DIPLOMA_MSG_EN = "new diploma has been added with name: ";
    const NEW_DIPLOMA_MSG_AR = "نم إضافة دبلوم جديد باسم: ";

    const NEW_COURSE_TITLE_EN = "New Course";
    const NEW_COURSE_TITLE_AR = "كورس جديد";
    const NEW_COURSE_MSG_EN = "new course has been added with name: ";
    const NEW_COURSE_MSG_AR = "نم إضافة كورس جديد باسم: ";

//    const UPDATE_COURSE_TITLE_EN = "Update Course";
//    const UPDATE_COURSE_TITLE_AR = "تعديل كورس";
//    const UPDATE_COURSE_MSG_EN = "course has been updated, course name: ";
//    const UPDATE_COURSE_MSG_AR = "نم تعديل الكورس ذو الاسم: ";


    const NEW_LECTURE_TITLE_EN = "New Lecture";
    const NEW_LECTURE_TITLE_AR = "محاضرة جديدة";
    const NEW_LECTURE_MSG_EN = "new lecture has been added with name: ";
    const NEW_LECTURE_MSG_AR = "نم إضافة محاضرة جديدة باسم: ";


    const NEW_TEST_TITLE_EN = "New Test";
    const NEW_TEST_TITLE_AR = "امتحان جديد";
    const NEW_TEST_MSG_EN = "new test has been added with name: ";
    const NEW_TEST_MSG_AR = "نم إضافة امتحان جديد باسم: ";


    const NEW_HOMEWORK_TITLE_EN = "New HomeWork";
    const NEW_HOMEWORK_TITLE_AR = "وظيفة جديدة";
    const NEW_HOMEWORK_MSG_EN = "new homework has been added with name: ";
    const NEW_HOMEWORK_MSG_AR = "نم إضافة وظيفة جديدة باسم: ";

    const NEW_HOMEWORK_MARK_TITLE_EN = "New HomeWork Mark";
    const NEW_HOMEWORK_MARK_TITLE_AR = "علامة وظيفة";
    const NEW_HOMEWORK_MARK_MSG_EN = "new mark has been added to the homeWork with name: ";
    const NEW_HOMEWORK_MARK_MSG_AR = "نم إضافة علامة جديدة للوظيفة باسم: ";

    const NEW_TEST_MARK_TITLE_EN = "New Test Mark";
    const NEW_TEST_MARK_TITLE_AR = "علامة امتحان";
    const NEW_TEST_MARK_MSG_EN = "new mark has been added to the test with name: ";
    const NEW_TEST_MARK_MSG_AR = "نم إضافة علامة جديدة للامتحان باسم: ";

    const NEW_SURVEY_TITLE_EN = "New Survey";
    const NEW_SURVEY_TITLE_AR = "استبيان جديد";
    const NEW_SURVEY_MSG_EN = "new Survey has been added with name: ";
    const NEW_SURVEY_MSG_AR = "نم إضافة استبيان جديد باسم: ";

    const NEW_COURSE_SUBSCRIPTION_TITLE_EN = "New Course Subscription";
    const NEW_COURSE_SUBSCRIPTION_TITLE_AR = "تسجيل في كورس جديد";
    const NEW_COURSE_SUBSCRIPTION_MSG_EN = "student has been subscribe in new course: ";
    const NEW_COURSE_SUBSCRIPTION_MSG_AR = "نم إرسال طلب من قبل الطالب للتسجيل في كورس جديد: ";

    const NEW_COMMENT_TITLE_EN = "New Comment";
    const NEW_COMMENT_TITLE_AR = "تعليق جديد";
    const NEW_COMMENT_MSG_EN = "new comment has been posted by student on blog: ";
    const NEW_COMMENT_MSG_AR = "تم إضافة تعليق جديد من قبل الطالب على المنشور: ";


    const NEW_STUDENT_REGISTER_TITLE_EN = "New Student Register";
    const NEW_STUDENT_REGISTER_TITLE_AR = "تسجيل طالب جديد";
    const NEW_STUDENT_REGISTER_MSG_EN = "new student has sent registration request: ";
    const NEW_STUDENT_REGISTER_MSG_AR = "تم إرسال طلب تسجيل طالب جديد: ";

    const NEW_APPLY_TEST_TITLE_EN = "New Apply Test";
    const NEW_APPLY_TEST_TITLE_AR = "التقدم لامتحان";
    const NEW_APPLY_TEST_MSG_EN = "student apply the test: ";
    const NEW_APPLY_TEST_MSG_AR = "تم التقدم من قبل الطالب للامتحان: ";

    const NEW_APPLY_HOMEWORK_TITLE_EN = "New Apply HomeWork";
    const NEW_APPLY_HOMEWORK_TITLE_AR = "رفع وظيفة";
    const NEW_APPLY_HOMEWORK_MSG_EN = "student apply the HomeWork: ";
    const NEW_APPLY_HOMEWORK_MSG_AR = "قام الطالب برفع الوظيفة: ";

    const NEW_APPLY_SURVEY_TITLE_EN = "New Apply Survey";
    const NEW_APPLY_SURVEY_TITLE_AR = "التقدم لاستبيان";
    const NEW_APPLY_SURVEY_MSG_EN = "student apply the Survey: ";
    const NEW_APPLY_SURVEY_MSG_AR = "تم التقدم من قبل الطالب للاستبيان: ";

    const NEW_CERTIFICATE_REQUEST_TITLE_EN = "New Certificate Request";
    const NEW_CERTIFICATE_REQUEST_TITLE_AR = "طلب الشهادة";
    const NEW_CERTIFICATE_REQUEST_MSG_EN = "student sent new Certificate Request for Diploma: ";
    const NEW_CERTIFICATE_REQUEST_MSG_AR = "قام الطالب بإرسال طلب شهادة للدبلوم: ";


//    const NEW_COURSE_TITLE_EN = "New Course";
//    const NEW_COURSE_TITLE_AR = "كورس جديد";
//    const NEW_COURSE_MSG_EN = "new course has been added with name: ";
//    const NEW_COURSE_MSG_AR = "نم إضافة كورس جديد باسم: ";

    const lectureType = [
        0 => 'unsync',
        1 => 'sync',

    ];

    const questionType = [
        1 => 'text',
        2 => 'trueFalse',
        3 => 'options',
        4 => 'multiChoice',

    ];

    const studentStatus = [
        0 => 'pending',
        1 => 'active',
        2 => 'deactivate',
    ];
}
