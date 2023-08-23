<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\IContactRepository;
use App\Models\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactRepository extends BaseRepository implements IContactRepository
{

    public function model()
    {
        return Contact::class;
    }

    public function getContact()
    {
        try {

            $settings = $this->model->first();


            return $settings;
        } catch (\Exception $exception) {
            if ($exception instanceof ModelNotFoundException) {
                throw new \Exception(trans('common_msg.' . JsonResponse::MSG_NOT_FOUND));
            }
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }
}
