<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    protected $userRepository;
    protected $notificationRepository;
    protected $requestData;

    public function __construct(IUserRepository $userRepository,
                                INotificationRepository $notificationRepository)
    {
        $this->userRepository = $userRepository;
        $this->notificationRepository = $notificationRepository;
        $this->requestData = Mapper::toUnderScore(\Request()->all());

    }


    public function getNotificationsForAdmin(Request $request)
    {

        try {

            $id = auth('admin')->user()->id;

            $nots = $this->notificationRepository->showNotificationsForUser('user', $id);


            return view('admin.notifications.notifications', compact('nots'));

        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }

    }


    public function getNumOfUnReadNotification(Request $request)
    {

        try {

            $id = auth('admin')->user()->id;


            $nots = $this->notificationRepository->getUnReadNotifications('user', $id);
            $data['unRead'] = count($nots);


            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_SUCCESS), $data);
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }

    }

    public function getNotificationsBriefly(Request $request)
    {

        try {

            $id = auth('admin')->user()->id;


            $nots = $this->notificationRepository->getNotificationsForUser('user', $id);

            $nots_ids = Arr::pluck($nots, 'id');

            $nots_data['status'] = 1;

            $update_nots = $this->notificationRepository->updateMultiNotifications($nots_data, $nots_ids);


            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_SUCCESS), $nots);
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }

    }

}
