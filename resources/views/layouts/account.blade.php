<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
    <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
        <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
            <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        </li>

        <li class="w3-hide-small"><a href="/" class="w3-padding-large w3-hover-white" title="News"><i class="fa fa-home"></i></a></li>

        <li class="w3-hide-small w3-right w3-dropdown-hover w3-padding-large ">

            <i class="fa fa-user "></i><span class="w3-badge w3-right w3-small w3-green" style="margin-right: 20px;">!</span></a>
            
            <div class="w3-dropdown-content w3-white w3-card-4">
                <a href="{{ url('/login') }}">登入</a>
                <a href="{{ url('/register') }}">註冊</a>
            </div>

        </li>

    </ul>
</div><!-- End Navbar -->

<div class="w3-display-middle" style="min-height: 310px; width: 600px;border: 2px solid black;border-radius: 8px;">
    @yield('content')
</div>

</body>
</html>

