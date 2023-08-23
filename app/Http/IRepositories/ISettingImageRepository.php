<?php


namespace App\Http\IRepositories;


interface ISettingImageRepository
{
    public function findByType($type);
}
