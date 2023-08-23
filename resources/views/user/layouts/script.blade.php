<script src="{{ URL::asset('messages.js') }}"></script>

<script src="{{asset('end-user/assets/js/jquery.min.js')}}"></script>
<!--====== jquery UI js ======-->
<script src="{{asset('end-user/assets/js/jquery-ui.min.js')}}"></script>
<!--====== Bootstrap js ======-->
<script src="{{asset('end-user/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('end-user/assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('end-user/assets/js/contact-form-script.js')}}"></script>
<!--====== Swiper js ======-->
<script src="{{asset('end-user/assets/js/swiper-min.js')}}"></script>
<!--====== Magnific Popup js ======-->
<script src="{{asset('end-user/assets/js/jquery-magnific-popup.js')}}"></script>
<!--====== Countdown js ======-->
<script src="{{asset('end-user/assets/js/countdown.j')}}s"></script>
<!--====== Main js ======-->
<script src="{{asset('end-user/assets/js/main.j')}}s"></script>
<script src="{{asset('end-user/assets/js/divScroll.js')}}"></script>
<script src="{{asset('end-user/assets/js/sliderdiv.js')}}"></script>

<script src="{{asset('assets/plugins/toastr/toastr.min.js') }}"></script>


<script>
    var isRtl =true;

    Lang.setLocale('ar');


    @if(Session::has('message'))
    setTimeout(function () {
        toastr['success'](
            '{{ session('message') }}',
            {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            }
        );
    }, 500);

    @endif
    @if(Session::has('error'))
    setTimeout(function () {
        toastr['error'](
            '{{ session('error') }}',
            {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            }
        );
    }, 500);
    @endif


</script>

@yield('script')

<script type="module">
    // Import the functions you need from the SDKs you need
    import {initializeApp} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
    import {getAnalytics} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries
    import {onMessage, getMessaging, getToken} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging.js";

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyDi1rdZJKIG2thCW-f3aHI6kmvNFd-72bM",
        authDomain: "kheracademy.firebaseapp.com",
        projectId: "kheracademy",
        storageBucket: "kheracademy.appspot.com",
        messagingSenderId: "615239209761",
        appId: "1:615239209761:web:80a2d6220ec4872bd1a460",
        measurementId: "G-3YTF62T9Q0"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);



    const messaging = getMessaging(app);

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    getToken(messaging, {vapidKey: 'BOlE2Ta5sElP2OTyEJt6CnIsfZIgPyEJR6hklFXvLNDkgDgq0wr1ojGVilCZ4p4JP-bsugksSIkXwvvgSgqbCrs'}).then((currentToken) => {
        if (currentToken) {
            // Send the token to your server and update the UI if necessary
            // ...
            console.log(currentToken);
            $('#not').val(currentToken);
        } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            // ...
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        // ...
    });
    onMessage(messaging, (payload) => {
        // ...
        setTimeout(function () {
            toastr['success'](
                '<span>' + payload.notification.title + '</span> ' +
                '<br>' +
                '<span>' + payload.notification.body + '</span>',
                {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: isRtl
                }
            );
        }, 500);


        getUnReadNumber();


    });

    getUnReadNumber();


    function getUnReadNumber() {
        $.ajax({
            type: 'GET',

            url: '/student/unread-notification-num',

            success: function (response) {

                if (response.status === 200) {
                    var num = response.content.unRead;
                    if (num > 0) {
                        $('#num_out').show()
                        $('#inner_num_out').show()
                        $('#num').get(0).innerHTML = num;
                        $('#inner_num').get(0).innerHTML = num;
                    } else {
                        $('#num_out').hide()
                        $('#inner_num_out').hide()
                    }
                }
            }
        });
    }

    $('#not_btn').on('click', function (e) {
        // alert('ola');
        // $('.dropdown-menu').toggle();



        $('#nots_list').empty();

        $.ajax({
            type: 'GET',

            url: '/student/show-notification-brief',


            success: function (response) {
                if (response.status === 200) {
                    var nots = response.content;
                    var assetPath = $('body').attr('data-asset-path');

                    $.each(nots, function (k, not) {

                        var color = 'primary';

                    //     $('#nots_list').append(
                    //         '<a class="d-flex p-3 border-bottom" href="'+not.link+'">'+
                    //         '<div class="notifyimg bg-pink">'+
                    //         '<i class="la la-file-alt text-white"></i>'+
                    // '</div>'+
                    // '<div class="ms-3">'+
                    // '<h5 class="notification-label mb-1">'+not.title+'</h5>'+
                    // '<p class="notification-label mb-1">'+not.message+'</p>'+
                    // '<div class="notification-subtext">'+not.notDate+'</div>'+
                    // '</div>'+
                    // '<div class="ms-auto">'+
                    // '<i class="las la-angle-left text-end text-muted"></i>'+
                    // '</div>'+
                    // '</a>'
                    //         );
                    // });
                        $('#nots_list').append(
                            '<a class="d-flex p-3 border-bottom" href="'+not.link+'">'+
                            '<div class="notifyimg bg-pink">'+
                            '<i class="la la-file-alt text-white"></i>'+
                    '</div>'+

                    '<div class="ms-3">'+
                    '<h5 class="notification-label mb-1">'+not.title+'</h5>'+
                    '<p class="notification-label mb-1">'+not.message+'</p>'+
                    '<div class="notification-subtext">'+not.notDate+'</div>'+
                    '</div>'+
                    '<div class="ms-auto">'+
                    '<i class="las la-angle-left text-end text-muted"></i>'+
                    '</div>'+

                    '</a>');
                    });
                    $('#num_out').hide()
                    $('#inner_num_out').hide()
                } else {
                    alert(response.message);
                }


            },
            error: function (jqXHR) {
                alert(jQuery.parseJSON(jqXHR.responseText).message);

            }
        });


    });

    $(window).on("blur focus", function (e) {
        var user = $('#user_value').val();

        if (user) {
            $.ajax({
                type: 'GET',

                url: '/student/unread-notification-num',

                success: function (response) {

                    var num = response.content.unRead;
                    if (num > 0) {
                        $('#num_out').show()
                        $('#inner_num_out').show()
                        $('#num').get(0).innerHTML = num;
                        $('#inner_num').get(0).innerHTML = num;
                    } else {
                        $('#num_out').hide()
                        $('#inner_num_out').hide()
                    }


                }
            });
        }

    });

</script>
