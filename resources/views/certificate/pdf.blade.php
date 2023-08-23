<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Certificate</title>
    <meta name="description" content="My Page Description">
    <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>
<body>
<div style=" height:800px; padding:20px; text-align:center; border: 10px solid #787878 ">
    <img src="{{ public_path('logo-1.png') }}" style="width: 200px; height: 200px">

    <div style=" height:550px; padding:20px; text-align:center; ">


        <span style="font-size:50px;  font-weight:bold">Certificate of Completion</span>
        <br><br>
        <span style="font-size:25px"><i>This is to certify that</i></span>
        <br><br>
        <span style="font-size:30px"><b>{{$name}}</b></span><br/><br/>
        <span style="font-size:25px"><i>has completed the diploma</i></span> <br/><br/>
        <span style="font-size:30px">{{$diploma}}</span> <br/><br/>
        <span style="font-size:20px">with score of <b>{{$grade}}%</b></span> <br/><br/><br/><br/>
        <span style="font-size:25px"><i>dated</i></span><br>

        <span style="font-size:30px">{{$date}}</span>
    </div>
</div>
<script src="js/scripts.js"></script>
</body>
</html>



{{--    <!DOCTYPE html>--}}

{{--<html>--}}

{{--<head>--}}

{{--    <title>Hi</title>--}}

{{--</head>--}}

{{--<body>--}}

{{--<h1>Welcome to ItSolutionStuff.com - {{ $title }}</h1>--}}

{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}

{{--    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}

{{--    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo--}}

{{--    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse--}}

{{--    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non--}}

{{--    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}



{{--<br/>--}}

{{--<strong>Public Folder:</strong>--}}

{{--<img src="{{ public_path('dummy.jpg') }}" style="width: 200px; height: 200px">--}}



{{--<br/>--}}

{{--<strong>Storage Folder:</strong>--}}

{{--<img src="{{ storage_path('app/public/dummy.jpg') }}" style="width: 200px; height: 200px">--}}

{{--</body>--}}

{{--</html>--}}
