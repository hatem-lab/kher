<?php


namespace App\Http\IRepositories;


interface ICourseStudentRepository
{
    public function getSubscriptionsByStatus($status);
}
