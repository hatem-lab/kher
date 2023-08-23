<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ICertificateRepository;
use App\Models\Certificate;

class CertificateRepository extends BaseRepository implements ICertificateRepository
{

    public function model()
    {
        return Certificate::class;
    }

}
