<?php


namespace App\Http\IRepositories;


interface IStudentCourseRegistrationRequestRepository
{
    public function getSubscriptionsByStatus($status);
    public function getSubscriptionsByIdAndStatus($id,$status);
    public function updateSubscriptionsByIdAndStatus($id,$status);
}
