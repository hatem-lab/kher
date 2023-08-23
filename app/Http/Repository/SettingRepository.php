<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\ISettingRepository;
use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingRepository extends BaseRepository implements ISettingRepository
{

    public function model()
    {
        return Setting::class;
    }

    public function getSettings()
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
