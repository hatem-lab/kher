<?php


namespace App\Http\Repository;


use App\Helpers\JsonResponse;
use App\Http\IRepositories\IOptionRepository;
use App\Models\Option;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OptionRepository extends BaseRepository implements IOptionRepository
{

    public function model()
    {
        return Option::class;
    }



//    public function getOptionsByQuestion($Q_id)
//    {
//        try {
//
//            $cities = $this->model->where('country_id', $Q_id)->get();
//
//
//            return $res;
//        } catch (\Exception $exception) {
//            if ($exception instanceof ModelNotFoundException) {
//                throw new \Exception(trans('common_msg.' . JsonResponse::MSG_NOT_FOUND));
//            }
//            throw new \Exception('common_msg.' . trans($exception->getMessage()));
//        }
//    }

}
