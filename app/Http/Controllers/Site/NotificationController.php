<?php

namespace App\Http\Controllers\Site;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IStudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NotificationController extends Controller
{
    //

    protected $studentRepository;
    protected $notificationRepository;
    protected $requestData;

    public function __construct(IStudentRepository $studentRepository,
                                INotificationRepository $notificationRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->notificationRepository = $notificationRepository;
        $this->requestData = Mapper::toUnderScore(\Request()->all());

    }


    public function getNotificationsForStudent(Request $request)
    {

        try {

            $id = auth('student')->user()->id;

            $nots = $this->notificationRepository->showNotificationsForUser('student', $id);

            return view('user.all-notifications', compact('nots'));

        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }

    }


    public function getNumOfUnReadNotification(Request $request)
    {

        try {

            $id = auth('student')->user()->id;


            $nots = $this->notificationRepository->getUnReadNotifications('student', $id);
            $data['unRead'] = count($nots);


            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_SUCCESS), $data);
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }

    }

    public function getNotificationsBriefly(Request $request)
    {

        try {

            $id = auth('student')->user()->id;


            $nots = $this->notificationRepository->getNotificationsForUser('student', $id);

            $nots_ids = Arr::pluck($nots, 'id');

            $nots_data['status'] = 1;

            $update_nots = $this->notificationRepository->updateMultiNotifications($nots_data, $nots_ids);


            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_SUCCESS), $nots);
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }

    }
}
