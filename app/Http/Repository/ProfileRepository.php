<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IProfileRepository;
use App\Models\Profile;

class ProfileRepository extends BaseRepository implements IProfileRepository
{

    public function model()
    {
        return Profile::class;
    }

}
