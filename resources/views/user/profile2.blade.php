@extends('user.layouts.master-page')

@section('title',' الملف الشخصي')

@section('style')


@endsection


@section('content')
    <section class="instructor-details-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="tab-content insructor-tab-content">
                        <div class="tab-pane fade show active m-t-100" id="tab_1" role="tabpanel">
                            <form action="{{route('student.update.profile')}}" method="POST" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="tilte-profile">
                                    <p>{{trans('students/students.Profile information')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group profile-img">
                                            <label for="AboutMe">{{trans('students/students.Profile Image')}}</label>
                                            <div class="col-12">
                                                <div class=" border p-1 card thumb profil-img-card">
                                                    <a href="#" class="image-popup" title="Screenshot-2"> <img
                                                            width="200px" height="100px"
                                                            src="{{URL::to('/') . '/Profile/students/' . $student->profile->image}}"
                                                            class="thumb-img"
                                                            alt="work-thumbnail"> </a>
                                                    <div class="ga-border"></div>

                                                </div>

                                                <h4 class="text-center tx-14 mt-3 mb-0">{{trans('students/students.Profile Image update')}}</h4>
                                                <input type="file" name="file" id="file" class="dropify"
                                                       data-height="200"/></div>


                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-group">
                                            <label for="FullName"
                                                   class="profil-parg">{{trans('students/students.Name_Ar')}}</label>
                                            <input name="name_ar" type="text" value="{{$student->name_ar}}"
                                                   id="FullName" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="FullName"
                                                   class="profil-parg">{{trans('students/students.Name_En')}}</label>
                                            <input name="name_en" type="text" value="{{$student->name_en}}"
                                                   id="FullName" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email"
                                                   class="profil-parg">{{trans('students/students.email')}}</label>
                                            <input name="email" type="email" value="{{$student->email}}" id="Email"
                                                   class="form-control">
                                        </div>
                                         <div class="form-group">
                                                <label class="profil-parg" for="Email">{{trans('students/students.password')}}</label>
                                                <input  name="password" type="password" value="" id="Email"class="form-control">
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        <div class="form-group">
                                            <label for="Username"
                                                   class="profil-parg">{{trans('students/students.address')}}</label>
                                            <input name="address" type="text" value=" @isset($student -> profile -> address) {{$student -> profile -> address}} @endisset"
                                                   id="Username" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="phone"
                                                   class="profil-parg">{{trans('students/students.phone')}}</label>
                                            <input name="phone" type="text" value="@isset($student -> profile -> phone) {{$student->profile->phone}} @endisset"
                                                   id="Password" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label for="birthday"
                                                       class="profil-parg">{{trans('students/students.birthday')}}</label>
                                                <div class="col-lg-6 col-md-6">

                                                    <input value="@isset($student -> profile -> address) {{$student->profile->birthday}} @endisset" type="date"
                                                           id="birthday" name="birthday">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input readonly value="{{$student->profile->birthday}}" type="text">

                                                </div>


                                            </div>
                                        </div>

                                        <div class="form-group">

                                                <label for="select-beast"
                                                       class="profil-parg">{{trans('students/students.certificate')}}</label>
                                                <div class="form-group">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="certificate_id" id="select-beast"
                                                            class="form-control h-60 nice-select  custom-select bs-35">
                                                        @foreach($certificate as $one)
                                                            <option value="{{$one->id}}"
                                                                    @if($student->certificate_id==$one->id) selected @endif >{{$one->getTranslatedName()}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                        </div>

                                        <div class="form-group">
                                            <button type="submit"
                                                    class=" btn btn-toggle">{{trans('students/students.update')}}</button>
                                        </div>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')


@endsection

