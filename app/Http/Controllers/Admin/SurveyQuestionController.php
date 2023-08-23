<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\JsonResponse;
use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IQuestionTypeRepository;
use App\Http\IRepositories\ISurveyOptionRepository;
use App\Http\IRepositories\ISurveyQuestionRepository;
use App\Http\IRepositories\ISurveyRepository;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveyQuestionController extends Controller
{
    protected $surveyQuestionRepository;
    protected $surveyOptionRepository;
    protected $questionTypeRepository;
    protected $surveyRepository;
    protected $requestData;


    public function __construct(ISurveyOptionRepository $surveyOptionRepository,
                                ISurveyQuestionRepository $surveyQuestionRepository,
                                IQuestionTypeRepository $questionTypeRepository,
                                ISurveyRepository $surveyRepository)
    {
        $this->surveyQuestionRepository = $surveyQuestionRepository;
        $this->surveyOptionRepository = $surveyOptionRepository;
        $this->questionTypeRepository = $questionTypeRepository;
        $this->surveyRepository = $surveyRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        try {

            $survey = $this->surveyRepository->find($id);

            return view('admin.surveys.questions.add', compact('survey' ));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        try {

            $data = $this->requestData;
            $data['survey_id'] = $id;
            $data['question_type_id'] = $type = $this->questionTypeRepository->find($this->requestData['type'])->id;


            $validator = Validator::make($data, $validator_rules = SurveyQuestion::create_update_rules);

            if ($validator->passes()) {

                $question = $this->surveyQuestionRepository->create($data);

                $data_option['survey_question_id'] = $question->id;
                if($type == 3 || $type == 4){
                    if(isset($data['options'][0]['option'])){
                        $options =  $data['options'];


                        foreach ($options as $option ){

                            if($option['option']){
                                $data_option['desc'] = $option['option'];
                                $created_option = $this->surveyOptionRepository->create($data_option);
//                                array_push($options, $option['option']);
                            }
                        }
                    }else{
                        return redirect()->route('survey.question.create', $id)->with('error', trans('questions/questions.required_option'));

                    }
                }

                return redirect()->route('survey.questions', $id)->with('message', trans('questions/questions.Question_Added_Successfully'));

            }
            return redirect()->route('survey.question.create', $id)->with('error', trans('general.Operation_Failed'));

        } catch (\Exception $e) {

            return redirect()->route('survey.question.create', $id)->with('error', $e->getMessage());

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
        try {

            $question = $this->surveyQuestionRepository->find($id);

            return view('admin.surveys.questions.edit', compact('question' ));

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Q_id)
    {
        //

        try {


            $data = $this->requestData;
            $question = $this->surveyQuestionRepository->find($Q_id);

            $data['survey_id'] = $question->survey_id;
            $data['question_type_id'] = $type = $this->questionTypeRepository->find($this->requestData['type'])->id;


            $validator = Validator::make($data, $validator_rules = SurveyQuestion::create_update_rules);

            if ($validator->passes()) {

//                dd($data['image']);
                $updated_question = $this->surveyQuestionRepository->update($data, $Q_id);

                $old_options = $question->SurveyOptions->pluck('id');
                if(!empty($old_options)){
                    foreach ($old_options as $old_option ){

                        $this->surveyOptionRepository->delete($old_option);
                    }
                }


                $data_option['survey_question_id'] = $Q_id;
                if($type == 3 || $type == 4){
                    if(isset($data['options'][0]['option'])){
                        $options =  $data['options'];


                        foreach ($options as $option ){

                            if($option['option']){
                                $data_option['desc'] = $option['option'];
                                $created_option = $this->surveyOptionRepository->create($data_option);
                            }
                        }
                    }else{
                        return redirect()->route('survey.question.edit', $Q_id)->with('error', trans('questions/questions.required_option'));

                    }
                }

                return redirect()->route('survey.questions', $question->survey_id)->with('message', trans('questions/questions.Question_Updated_Successfully'));

            }
            return redirect()->route('survey.question.edit', $Q_id)->with('error', trans('general.Operation_Failed'));

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('survey.question.edit', $Q_id)->with('error', $e->getMessage());

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

            $question = $this->surveyQuestionRepository->find($id);
            $old_options = $question->SurveyOptions->pluck('id');
            if(!empty($old_options)){
                foreach ($old_options as $old_option ){

                    $this->surveyOptionRepository->delete($old_option);
                }
            }
            $this->surveyQuestionRepository->delete($id);

            return JsonResponse::respondSuccess(trans('common_msg.' . JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $ex) {
            return JsonResponse::respondError($ex->getMessage());
        }

    }
}
