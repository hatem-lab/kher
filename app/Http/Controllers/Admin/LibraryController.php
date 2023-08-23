<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants;
use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Helpers\Notifications;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\ILibraryRepository;
use App\Models\Library;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;


class LibraryController extends Controller
{

    protected $libraryRepository;
    protected $requestData;

    public function __construct(ILibraryRepository $libraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());
        $this->middleware('permission:library');
        $this->middleware('permission:list library files')->only(['index']);
        $this->middleware('permission:add library files')->only(['create']);
        $this->middleware('permission:edit library files')->only(['edit']);
        $this->middleware('permission:delete library files')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {

            $libs = $this->libraryRepository->all();
            return view('admin.library.list', compact('libs'));

        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.library.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        try {

            $data = $this->requestData;


            $validator = Validator::make($data, $validator_rules = Library::create_update_rules);

            if ($validator->passes()) {
                if( $request->file('image'))
                {
                    $img = $request->file('image')->getClientOriginalName();

                    $data['image'] = '/Library/' . $request->name.'/'.$img;

                    $request->image->move(public_path('Library/' . $request->name), $img);
                }

                $library = $this->libraryRepository->create($data);


                return redirect()->route('library.index')->with('message', trans('library/library.File_Added_Successfully'));

            }
            return redirect()->route('library.create')->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('library.create')->with('error', $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $lib = $this->libraryRepository->find($id);
        return view('admin.library.edit', compact('lib'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {

            $data = $this->requestData;



            $validator = Validator::make($data, $validator_rules = Library::create_update_rules);

            if ($validator->passes()) {
                if( $request->file('image'))
                {

                    $img = $request->file('image')->getClientOriginalName();

                    $data['image'] = '/Library/' . $request->name.'/'.$img;

                    $request->image->move(public_path('Library/' . $request->name), $img);
                }

                $user = $this->libraryRepository->update($data, $id);


                return redirect()->route('library.index')->with('message', trans('library/library.File_Updated_Successfully'));

            }
            return redirect()->route('library.edit', $id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            return redirect()->route('library.edit', $id)->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            $this->libraryRepository->delete($id);
            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }
    }
}
