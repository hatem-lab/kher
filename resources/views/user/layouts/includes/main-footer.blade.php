<footer class="footer-wrap style1 bg-heath">
    <div class="footer-top pt-100 pb-70">
        <div class="container">
            <div class="m-foote">
            <div class="row">
                <div class="col-lg-4  col-md-4 col-sm-12">
                    <div class="footer-widget d-flex flex-column justify-content-center align-items-center">
                        <h4 class="footer-widget-title">{{trans('enduser/Home/Home.Acadimic Kaire')}}</h4>
                    <div class="logo">
                        <a href="{{route('site.home')}}">
                            <img class="logo-light" src="{{asset('assets/img/brand/logo-1.png')}}" alt="Image">
                            <!-- <img class="logo-dark" src="{{asset('assets/img/brand//logo-1.png')}}" alt="Image"> -->
                        </a>
                    </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">{{trans('enduser/Home/Home.Contact Us')}}</h4>
                        <ul class="footer-contact-address">
                            <li><i class="fa fa-envelope-open"></i><a href="{{route('Contact_us')}}">{{trans('enduser/Home/Home.Contact Us')}}</a></li>

                            @foreach(json_decode(\App\Models\Contact::first()->mobile_phones) as $phone)
                            <li><i class="ri-phone-line"></i>{{$phone}}</li>
                            @endforeach
                            <li> <i class="ri-mail-send-fill"></i> <a href="mailto:info@ecour.com">{{\App\Models\Setting::first()->address}}</a></li>
                            <!-- <li> <i class="ri-earth-fill"></i> <a href="https://www.ecour.com">www.ecour.com</a></li> -->
                        </ul>
                    </div>
                </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="footer-widget">
                                <div class="share-on">
                                <h4 class="footer-widget-title">{{trans('enduser/Home/Home.Follow Us')}} :</h4>
                                    <ul class="social-profile">
                                        <li><a target="_blank" href="{{\App\Models\Contact::first()->facebook_link}}"><i class="ri-facebook-fill"></i> </a></li>
                                        <li><a target="_blank" href="{{\App\Models\Contact::first()->twitter_link}}"> <i class="ri-twitter-fill"></i> </a></li>
                                        <li><a target="_blank" href="{{\App\Models\Contact::first()->linkedin_link}}"> <i class="ri-linkedin-fill"></i> </a></li>
                                        <li><a target="_blank" href="{{\App\Models\Contact::first()->insta_link}}"> <i class="ri-instagram-line"></i> </a></li>
                                        <li><a target="_blank" href="{{\App\Models\Contact::first()->whats_link}}"> <i class="ri-whatsapp-fill"></i> </a></li>
                                        <li><a target="_blank" href="{{\App\Models\Contact::first()->telegram_link}}"> <i class="ri-telegram-line"></i> </a></li>

                                    </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-8">
                    <div class="copyright-text">
                        <p>Copyright <span class="las la-copyright"></span> <script>document.write(new Date().getFullYear())</script>. All Rights Reserved By <a href="https://themeforest.net/user/hibootstrap/portfolio">Hibootstrap</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</footer>



