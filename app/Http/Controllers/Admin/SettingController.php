<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Mapper;
use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IContactRepository;
use App\Http\IRepositories\ISettingImageRepository;
use App\Http\IRepositories\ISettingRepository;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //

    protected $settingRepository;
    protected $settingImageRepository;
    protected $contactRepository;
    protected $requestData;

    public function __construct(ISettingRepository $settingRepository,
                                ISettingImageRepository $settingImageRepository,
                                IContactRepository $contactRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->settingImageRepository = $settingImageRepository;
        $this->contactRepository = $contactRepository;

        $this->requestData = Mapper::toUnderScore(\Request()->all());
        $this->middleware('permission:Setting');


    }

    public function index()
    {

        try {

            $settings = $this->settingRepository->getSettings();
            $contacts = $this->contactRepository->getContact();

            $image1 = $this->settingImageRepository->findByType('slider_1');
            $image2 = $this->settingImageRepository->findByType('slider_2');
            $image3 = $this->settingImageRepository->findByType('slider_3');
            $image4 = $this->settingImageRepository->findByType('slider_4');

            return view('admin.settings.list', compact('settings', 'contacts', 'image1', 'image2', 'image3', 'image4'));

        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function updateAbout(Request $request)
    {

        try {

            $data_info= $this->requestData;
            $about = $this->settingRepository->getSettings();

//            dd($request->file('logo'));

            $validator = Validator::make($data_info, $validator_rules = Setting::create_update_rules, ValidatorHelper::messages() );

            if($validator->passes()){

//                if ($request->file('logo')) {
//                    $img = $request->file('logo');
//                    $name = "logoImage_" . time() . '_'.$img->getClientOriginalName();
//                    $uploaded_file = $img->move(public_path('images/admin/logo/'), $name);
//                    $path = '/images/admin/logo/' . $name;
//
//                    $data_info['logo'] = $path;
//                }

                if($request->file('preview')) {
                    $file = $request->file('preview'); //

                    $filename = time().'_'.$file->getClientOriginalName();

                    // File upload location
                    $location = public_path('files/admin/videos/');
                    $path = '/files/admin/videos/' . $filename;
                    // Upload file
                    $file->move($location,$filename);

                    $data_info['video']= $path;
                }


                if($about){
                    $model = $this->settingRepository->update($data_info,$about->id);

                }else{
                    $model = $this->settingRepository->create($data_info);

                }
                return redirect()->route('settings')->with('message', trans('settings/settings.about_updated_successfully') );

            }
            return redirect()->route('settings')->with('error', trans('general.Operation_Failed'));

        }catch (Exception $e){
            return redirect()->route('admin-settings')->with('error', $e->getMessage());

        }
    }


    public function updateContacts(Request $request)
    {

        try {
            $data_info= $this->requestData;
            $contact = $this->contactRepository->getContact();
//            dd($data_info);

            $mobile_phones = $data_info['mobiles'];
            $res_mobile =[];
            foreach ($mobile_phones as $phone ){

                if($phone['mobile_phone']){

                    $loc_mobile = $phone['mobile_phone'];

                    array_push($res_mobile, $loc_mobile);
                }
            }
            $data_info['mobile_phones'] = json_encode($res_mobile);


            $land_phones = $data_info['lands'];
            $res_land =[];
            foreach ($land_phones as $phone ){

                if($phone['land_phone']){

                    $loc_land = $phone['land_phone'];

                    array_push($res_land, $loc_land);
                }
            }
            $data_info['land_phones'] = json_encode($res_land);

//            dd($data_info);

            $validator = Validator::make($data_info, $validator_rules = Setting::create_update_rules, ValidatorHelper::messages() );

            if($validator->passes()){


                $data_info['email']=$request->email;

                if($contact){

                    $model = $this->contactRepository->update($data_info,$contact->id);

                }else{
                    $model = $this->contactRepository->create($data_info);

                }
                return redirect()->route('settings')->with('message', trans('settings/settings.contacts_updated_successfully') );

            }
            return redirect()->route('settings')->with('error', trans('general.Operation_Failed'));

        }catch (Exception $e){
            return redirect()->route('admin-settings')->with('error', $e->getMessage());

        }
    }

    public function updateImages(Request $request)
    {

        try {

//            $image2 = $this->settingImageRepository->findByType('slider_2');
//            $image3 = $this->settingImageRepository->findByType('slider_3');
//            $image4 = $this->settingImageRepository->findByType('slider_4');



            if( $request->file('image1'))
            {



                $img = $request->file('image1');
                $name = "slider_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('Settings/'), $name);
                $path = '/Settings/' . $name;

                $data_im_1['name'] = $name;
                $data_im_1['path'] = $path;


            }
            $image1 = $this->settingImageRepository->findByType('slider_1');

            $data_im_1['caption'] = $this->requestData['desc_img_1'];
            $data_im_1['type'] = 'slider_1';

            if($image1){
                $this->settingImageRepository->update($data_im_1, $image1->id);
            }else{
                $this->settingImageRepository->create($data_im_1);

            }

            if( $request->file('image2'))
            {



                $img = $request->file('image2');
                $name = "slider_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('Settings/'), $name);
                $path = '/Settings/' . $name;

                $data_im_2['name'] = $name;
                $data_im_2['path'] = $path;



            }

            $image2 = $this->settingImageRepository->findByType('slider_2');
            $data_im_2['caption'] = $this->requestData['desc_img_2'];
            $data_im_2['type'] = 'slider_2';
            if($image2){
                $this->settingImageRepository->update($data_im_2, $image2->id);
            }else{
                $this->settingImageRepository->create($data_im_2);

            }


            if( $request->file('image3'))
            {


                $img = $request->file('image3');
                $name = "slider_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('Settings/'), $name);
                $path = '/Settings/' . $name;

                $data_im_3['name'] = $name;
                $data_im_3['path'] = $path;



            }

            $image3 = $this->settingImageRepository->findByType('slider_3');
            $data_im_3['caption'] = $this->requestData['desc_img_3'];
            $data_im_3['type'] = 'slider_3';
            if($image3){
                $this->settingImageRepository->update($data_im_3, $image3->id);
            }else{
                $this->settingImageRepository->create($data_im_3);

            }


            if( $request->file('image4'))
            {



                $img = $request->file('image4');
                $name = "slider_" . time() . '_'.$img->getClientOriginalName();
                $uploaded_file = $img->move(public_path('Settings/'), $name);
                $path = '/Settings/' . $name;

                $data_im_4['name'] = $name;
                $data_im_4['path'] = $path;



            }
            $image4 = $this->settingImageRepository->findByType('slider_4');
            $data_im_4['caption'] = $this->requestData['desc_img_4'];
            $data_im_4['type'] = 'slider_4';
            if($image4){
                $this->settingImageRepository->update($data_im_4, $image4->id);
            }else{
                $this->settingImageRepository->create($data_im_4);

            }



            return redirect()->route('settings')->with('message', trans('settings/settings.images_updated_successfully') );

        }catch (Exception $e){
            return redirect()->route('settings')->with('error', $e->getMessage());

        }
    }

}
