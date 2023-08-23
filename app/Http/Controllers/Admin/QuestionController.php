<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IOptionRepository;
use App\Http\IRepositories\IQuestionRepository;
use App\Http\IRepositories\IQuestionTypeRepository;
use App\Http\IRepositories\ITestRepository;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    protected $questionRepository;
    protected $optionRepository;
    protected $questionTypeRepository;
    protected $testRepository;
    protected $requestData;


    public function __construct(IQuestionRepository $questionRepository,
                                IOptionRepository $optionRepository,
                                IQuestionTypeRepository $questionTypeRepository,
                                ITestRepository $testRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->optionRepository = $optionRepository;
        $this->questionTypeRepository = $questionTypeRepository;
        $this->testRepository = $testRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());
        $this->middleware('permission:create Question')->only(['create']);
        $this->middleware('permission:update Question')->only(['edit']);
        $this->middleware('permission:delete Question')->only(['destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        //
        try {

            $test = $this->testRepository->find($id);

            return view('admin.questions.add', compact('test' ));

        } catch (Exception $e) {
            return $e->getMessage();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, $id)
    {
        //

        try {
//            dd($this->questionTypeRepository->find($this->requestData['type'])->id);

            $data = $this->requestData;
            $data['test_id'] = $id;
            $data['question_type_id'] = $type = $this->questionTypeRepository->find($this->requestData['type'])->id;

//            dd($data);
            $validator = Validator::make($data, $validator_rules = Question::create_update_rules);

            if ($validator->passes()) {

                if ($request->file('image')) {
                    $img = $request->file('image');
                    $name = "questionImage_" . time() . '_'.$img->getClientOriginalName();
                    $uploaded_file = $img->move(public_path('images/admin/questions/'), $name);
                    $path = '/images/admin/questions/' . $name;

                    $data['image'] = $path;
                }

                $question = $this->questionRepository->create($data);

                $data_option['question_id'] = $question->id;
                if($type == 3 || $type == 4){
                    if(isset($data['options'][0]['option'])){
                        $options =  $data['options'];


                        foreach ($options as $option ){

                            if($option['option']){
                                $data_option['desc'] = $option['option'];
                                $created_option = $this->optionRepository->create($data_option);
//                                array_push($options, $option['option']);
                            }
                        }
                    }else{
                        return redirect()->route('test.question.create', $id)->with('error', trans('questions/questions.required_option'));

                    }
                }

                return redirect()->route('test.questions', $id)->with('message', trans('questions/questions.Question_Added_Successfully'));

            }
            return redirect()->route('test.question.create', $id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {

            return redirect()->route('test.question.create', $id)->with('error', $e->getMessage());

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
        try {

            $question = $this->questionRepository->find($id);

            return view('admin.questions.edit', compact('question' ));

        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $Q_id
     * @return Response
     */
    public function update(Request $request, $Q_id)
    {
        //

        try {


            $data = $this->requestData;
            $question = $this->questionRepository->find($Q_id);

            $data['test_id'] = $question->test_id;
            $data['question_type_id'] = $type = $this->questionTypeRepository->find($this->requestData['type'])->id;

//            dd('$old_options[0]');
            $validator = Validator::make($data, $validator_rules = Question::create_update_rules);

            if ($validator->passes()) {

                if ($request->file('image') && !$this->requestData['remove_image']) {
                    $img = $request->file('image');
                    $name = "questionImage_" . time() . '_'.$img->getClientOriginalName();
                    $uploaded_file = $img->move(public_path('images/admin/questions/'), $name);
                    $path = '/images/admin/questions/' . $name;

                    $data['image'] = $path;
                }
                if($this->requestData['remove_image']){
                    $data['image'] = '';


                }
//                dd($data['image']);
                $updated_question = $this->questionRepository->update($data, $Q_id);

                $old_options = $question->options->pluck('id');
                if(!empty($old_options)){
                    foreach ($old_options as $old_option ){

                        $this->optionRepository->delete($old_option);
                    }
                }


                $data_option['question_id'] = $Q_id;
                if($type == 3 || $type == 4){
                    if(isset($data['options'][0]['option'])){
                        $options =  $data['options'];


                        foreach ($options as $option ){

                            if($option['option']){
                                $data_option['desc'] = $option['option'];
                                $created_option = $this->optionRepository->create($data_option);
                            }
                        }
                    }else{
                        return redirect()->route('question.edit', $Q_id)->with('error', trans('questions/questions.required_option'));

                    }
                }

                return redirect()->route('test.questions', $question->test_id)->with('message', trans('questions/questions.Question_Updated_Successfully'));

            }
            return redirect()->route('question.edit', $Q_id)->with('error', trans('general.Operation_Failed'));

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('question.edit', $Q_id)->with('error', $e->getMessage());

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

            $question = $this->questionRepository->find($id);
            $old_options = $question->options->pluck('id');
            if(!empty($old_options)){
                foreach ($old_options as $old_option ){

                    $this->optionRepository->delete($old_option);
                }
            }
            $this->questionRepository->delete($id);

            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }
}
