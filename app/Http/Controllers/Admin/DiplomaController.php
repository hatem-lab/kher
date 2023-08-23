<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IDiplomaRepository;
use App\Http\IRepositories\INotificationRepository;
use App\Http\IRepositories\IStudentRepository;
use App\Models\Diploma;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class DiplomaController extends Controller
{
    protected $diplomaRepository;
    protected $studentRepository;
    protected $notificationRepository;
    protected $requestData;


    public function __construct(IDiplomaRepository $diplomaRepository,
                                IStudentRepository $studentRepository,
                                INotificationRepository $notificationRepository)
    {
        $this->diplomaRepository = $diplomaRepository;
        $this->studentRepository = $studentRepository;
        $this->notificationRepository = $notificationRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

        $this->middleware('permission:diplomas');
        $this->middleware('permission:create diplomas')->only(['create']);
        $this->middleware('permission:update diplomas')->only(['edit']);
        $this->middleware('permission:delete diplomas')->only(['destroy']);
        $this->middleware('permission:show diploma')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        try {

            $diplomas = $this->diplomaRepository->all();
            return view('admin.diplomas.list', compact('diplomas'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

        return view('admin.diplomas.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        try {

            $data = $this->requestData;


            $validator = Validator::make($data, $validator_rules = Diploma::create_update_rules);

            if ($validator->passes()) {
               if( $request->file('image'))
               {
                   $data['image'] = $request->file('image')->getClientOriginalName();
                   $request->image->move(public_path('Diploma/' . $request->title), $data['image']);
               }

                $diploma = $this->diplomaRepository->create($data);

                $fcm_data = [
                    'diploma_id' => $diploma->id,


                ];
                $fcm_message = Constants::NEW_DIPLOMA_MSG_AR . $diploma->title;
                $fcm_title = Constants::NEW_DIPLOMA_TITLE_AR;

                $students = $this->studentRepository->getStudentByStatus(1);

                $student_tokens = [];
                foreach ($students as $student) {
                    if ($student->fcm_token != '0') {
                        array_push($student_tokens, $student->fcm_token); // (logged in) just get a valid fcm_token for admin
                    }
                }

                if (!empty($student_tokens)) {
                    $notification = Notifications::addNotification($student_tokens, $fcm_title, $fcm_message, $fcm_data);

                }

                $not_data['type'] = 'new_diploma';
                $not_data['fcm_message_en'] = Constants::NEW_DIPLOMA_MSG_EN . $diploma->title;
                $not_data['fcm_title_en'] = Constants::NEW_DIPLOMA_TITLE_EN;
                $not_data['fcm_message_ar'] = Constants::NEW_DIPLOMA_MSG_AR . $diploma->title;
                $not_data['fcm_title_ar'] = Constants::NEW_DIPLOMA_TITLE_AR;
                $not_data['fcm_data'] = json_encode($fcm_data);
                $not_data['user_type'] = 'student';
                $not_data['user_id'] = null;


                foreach ($students as $student) {
                    $not_data['student_id'] = $student->id;
                    $this->notificationRepository->create($not_data);
                }

                return redirect()->route('diploma.index')->with('message', trans('diplomas/diplomas.Diploma_Added_Successfully'));

            }
            return redirect()->route('diploma.create')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('diploma.create')->with('error', $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $diploma = $this->diplomaRepository->showDiploma($id);
        return view('admin.diplomas.show', compact('diploma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $diploma = $this->diplomaRepository->find($id);
        return view('admin.diplomas.edit', compact('diploma'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        try {

            $data = $this->requestData;



            $validator = Validator::make($data, $validator_rules = Diploma::create_update_rules);

            if ($validator->passes()) {
                if( $request->file('image'))
                {

                    $data['image'] = $request->file('image')->getClientOriginalName();
                    $request->image->move(public_path('Diploma/' . $request->title), $data['image']);
                }

                $user = $this->diplomaRepository->update($data, $id);


                return redirect()->route('diploma.index')->with('message', trans('diplomas/diplomas.Diploma_Updated_Successfully'));

            }
            return redirect()->route('diploma.edit', $id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('diploma.edit', $id)->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        try {

            $this->diplomaRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
}
