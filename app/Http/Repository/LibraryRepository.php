<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ILibraryRepository;
use App\Models\Library;

class LibraryRepository  extends BaseRepository implements ILibraryRepository
{

    public function model()
    {
        return Library::class;
    }

}
