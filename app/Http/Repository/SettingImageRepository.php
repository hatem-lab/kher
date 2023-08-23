<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\ISettingImageRepository;
use App\Models\SettingImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingImageRepository extends BaseRepository implements ISettingImageRepository
{

    public function model()
    {
        return SettingImage::class;
    }

    public function findByType($type)
    {
        try {

            $image = $this->model->where('type', $type)->first();


            return $image;
        } catch (\Exception $exception) {
            throw new \Exception('common_msg.' . trans($exception->getMessage()));
        }
    }
}
