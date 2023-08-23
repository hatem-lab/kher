<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ICertificateRepository;
use App\Models\Certificate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    protected $certificateRepository;
    protected $requestData;


    public function __construct(ICertificateRepository $certificateRepository)
    {
        $this->middleware('permission:create Certificate')->only(['create']);
        $this->middleware('permission:update Certificate')->only(['edit']);
        $this->middleware('permission:delete Certificate')->only(['destroy']);
        $this->middleware('permission:Certificates')->only(['index']);
        $this->certificateRepository = $certificateRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());


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

            $certificates = $this->certificateRepository->all();
            return view('admin.certificates.list', compact('certificates'));

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        return view('admin.certificates.add');


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

            $validator = Validator::make($data, $validator_rules = Certificate::create_update_rules);

            if ($validator->passes()) {


                $user = $this->certificateRepository->create($data);


                return redirect()->route('certificate.index')->with('message', trans('certificates/certificates.Certificate_Added_Successfully'));

            }
            return redirect()->route('certificate.create')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('certificate.create')->with('error', $e->getMessage());

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $certificate = $this->certificateRepository->find($id);
        return view('admin.certificates.edit', compact('certificate'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //

        try {

            $data = $this->requestData;

            $validator = Validator::make($data, $validator_rules = Certificate::create_update_rules);

            if ($validator->passes()) {


                $user = $this->certificateRepository->update($data, $id);


                return redirect()->route('certificate.index')->with('message', trans('certificates/certificates.Certificate_Updated_Successfully'));

            }
            return redirect()->route('certificate.edit', $id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('certificate.edit', $id)->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        try {

            $this->certificateRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }


    }
}
