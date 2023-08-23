<?php


namespace App\Http\Repository;


use App\Http\IRepositories\IFileRepository;
use App\Models\File;

class FileRepository extends BaseRepository implements IFileRepository
{

    public function model()
    {
        return File::class;
    }

}
