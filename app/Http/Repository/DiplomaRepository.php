<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IDiplomaRepository;
use App\Models\Diploma;

class DiplomaRepository extends BaseRepository implements IDiplomaRepository
{

    public function model()
    {
        return Diploma::class;
    }

    public function showDiploma($id)
    {
       return  Diploma::find($id);

    }
    

}
