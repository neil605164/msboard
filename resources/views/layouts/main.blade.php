<!DOCTYPE html>
<html>
<title>main</title>
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

        @if(auth::guest())
        <li class="w3-hide-small w3-right w3-dropdown-hover w3-padding-large ">
            <i class="fa fa-user "></i><span class="w3-badge w3-right w3-small w3-green" style="margin-right: 20px;">!</span></a>
            <div class="w3-dropdown-content w3-white w3-card-4">
                <a href="{{ url('/login') }}">登入</a>
                <a href="{{ url('/register') }}">註冊</a>
            </div>
        </li>
        @else
        <li><a href="/msboard/public" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a></li>
        <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a></li>
        <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a></li>
        <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a></li>

        <li class="w3-hide-small w3-dropdown-hover">
            <a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a>
            <div class="w3-dropdown-content w3-white w3-card-4">
                <a href="#">One new friend request</a>
                <a href="#">John Doe posted on your wall</a>
                <a href="#">Jane likes your post</a>
            </div>
        </li>

        <li class="w3-hide-small">
            <a class="w3-padding-large w3-hover-white" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <li class="w3-hide-small">
                <a href="{{ url('/logout') }}" class="w3-padding-large w3-hover-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="position: absolute; Right: 0%;" title="logout">
                    <i class="fa fa-sign-out"></i>
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </li>
        @endif
    </ul>
</div><!-- End Navbar -->


<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
    <ul class="w3-navbar w3-left-align w3-large w3-theme">
        <li><a class="w3-padding-large" href="#">Link 1</a></li>
        <li><a class="w3-padding-large" href="#">Link 2</a></li>
        <li><a class="w3-padding-large" href="#">Link 3</a></li>
        <li><a class="w3-padding-large" href="#">My Profile</a></li>
    </ul>
</div><!-- Navbar on small screens -->

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
            <!-- Profile -->
            <div class="w3-card-2 w3-round w3-white " style="min-height:350px;">

                <div class="w3-container">

                    <h4 class="w3-center">My Photo</h4>
                    <!--這裡可以優化-->
                    @if(isset($photos))
                            <p class="w3-center"><img src="{{ url('../storage/app/' . $photos->path) }}" width="300px" height="200px" style="border: 5px solid; border-radius: 12px"></p>
                    @else
                            <p class="w3-center"><img alt="尚未上傳圖片" width="300px" height="200px" style="border: 5px solid; border-radius: 12px""></p>
                    @endif
                    <hr>
                    
                    @foreach($infos as $info)
                        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>{{ $info->name }}</p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>{{ $info->type }}</p>
                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>{{ $info->discription}}</p>
                    @endforeach

                    @if(!auth::guest())
                        <a href="{{ url('/showInfo') }}"><i class="fa fa-pencil fa-fw w3-margin-bottom" title="edit" style="margin-left: 290px;"></i></a>
                    @endif

                </div>

            </div>
            <br>
              
            <!-- Accordion -->
            <div class="w3-card-2 w3-round">
                <div class="w3-accordion w3-white">
                    <button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
                    <div id="Demo3" class="w3-accordion-content w3-container" style="min-height:150px;">
                        <div class="w3-row-padding">
                            @if(!auth::guest() && isset($all_photos))
                                @foreach($all_photos as $all_photo)
                                    <img src="{{ url('../storage/app/' . $all_photo->path) }}" alt="尚未上傳圖片" width="120px" height="80px" style="border: 3px solid; border-radius: 5px">
                                @endforeach
                                <a href="{{ url('/showPhoto') }}"><i class="fa fa-pencil fa-fw w3-margin-bottom" title="edit" style="margin-left: 270px; margin-top: 80px;"></i></a>
                            @else
                                @foreach($all_photos as $all_photo)
                                    <img src="{{ url('../storage/app/' . $all_photo->path) }}" alt="尚未上傳圖片" width="120px" height="80px" style="border: 3px solid; border-radius: 5px">
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div><!-- End Accordion -->
            <br>
              
            <!-- Interests -->
            <div class="w3-card-2 w3-round w3-white w3-hide-small">
                <div class="w3-container">
                    <p>Interests</p>
                    <p>
                    <span class="w3-tag w3-small w3-theme-d5">News</span>
                    <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
                    <span class="w3-tag w3-small w3-theme-d3">Labels</span>
                    <span class="w3-tag w3-small w3-theme-d2">Games</span>
                    <span class="w3-tag w3-small w3-theme-d1">Friends</span>
                    <span class="w3-tag w3-small w3-theme">Games</span>
                    <span class="w3-tag w3-small w3-theme-l1">Friends</span>
                    <span class="w3-tag w3-small w3-theme-l2">Food</span>
                    <span class="w3-tag w3-small w3-theme-l3">Design</span>
                    <span class="w3-tag w3-small w3-theme-l4">Art</span>
                    <span class="w3-tag w3-small w3-theme-l5">Photos</span>
                    </p>
                </div>
            </div><!-- End Interests -->
            <br>
              
            <!-- Alert Box -->
            <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
                <span onclick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
                  <i class="fa fa-remove"></i>
                </span>
                <p><strong>Hey!</strong></p>
                <p>People are looking at your profile. Find out who.</p>
            </div><!-- End Alert Box -->
            
        <!-- End Left Column -->
        </div>
        
        <!-- Middle Column -->

        <div class="w3-col m7">
            <form action="{{ url('/PB_message') }}" method="POST" >
            {{ csrf_field() }}
                <div class="w3-row-padding">
                    <div class="w3-col m12">
                        <div class="w3-card-2 w3-round w3-white">
                            <div class="w3-container w3-padding">
                                <h6 class="w3-opacity">寫下你的心情吧</h6>
                                <textarea name="content" contenteditable="true" class="w3-border w3-padding" style="width:700px;height:150px;"></textarea>
                                @if(!auth::guest())
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                                @endif
                                <button class="w3-btn w3-theme"><i class="fa fa-pencil"></i> 發佈 </button> 
                                <input type="hidden" name="type" value="ms_all">
                            </div>
                        </div>
                    </div>
                </div>
            </form>  

            @if(count($message)>0)
                @foreach($message as $content)
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin" style="min-height:250px;"><br>
                
                    @if(count($photos)>0 && !auth::guest())

                        <img src="{{ url('../storage/app/' . $photos->path) }}" alt="無法顯示圖片" class="w3-left w3-Rounded w3-margin-right" style="width:60px">
                    
                        <span class="w3-right w3-opacity">1 min</span>
                        <h4>{{ $user->name }}</h4><br>
                    @else
                        <p class="fa fa-close">目前沒有權限看見發文者</p>
                    @endif
                    <hr class="w3-clear">
                    @if(isset($message))
                        <p>{{  $content->content }}</p>
                    @endif
                    <form action="{{ url('/PB_message') }}" method="POST" >

                        <button type="button" id="ms_guest_bt" class="w3-btn w3-theme-d1 w3-margin-bottom" value="1" name="ms_button"><i class="fa fa-thumbs-up"></i>  Like</button> 
                        <button type="button" id="ms_guest_bt" class="w3-btn w3-theme-d2 w3-margin-bottom" value="2" name="ms_button"><i class="fa fa-comment"></i>  回覆</button>
                        <input type="text" name="ms_guest" style="display:block; width: 100%; ">
                        <input type="hidden" name="msboard_id" value="{{ $content->id }}">
                        <input type="hidden" name="type" value="ms_guest">
                    </form>
                 
                </div>
                @endforeach
            @endif        
        <!-- End Middle Column -->
        </div>
        
        <!-- Right Column -->
        <div class="w3-col m2">

            <div class="w3-card-2 w3-round w3-white w3-center">
                <div class="w3-container">
                    <p>Upcoming Events:</p>
                    <img src="img_forest.jpg" alt="Forest" style="width:100%;">
                    <p><strong>Holiday</strong></p>
                    <p>Friday 15:00</p>
                    <p><button class="w3-btn w3-btn-block w3-theme-l4">Info</button></p>
                </div>
            </div>
            <br>
          
            <div class="w3-card-2 w3-round w3-white w3-center">
                <div class="w3-container">
                    <p>Friend Request</p>
                    <img src="img_avatar6.png" alt="Avatar" style="width:50%"><br>
                    <span>Jane Doe</span>
                    <div class="w3-row w3-opacity">
                        <div class="w3-half">
                            <button class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
                        </div>
                        <div class="w3-half">
                            <button class="w3-btn w3-red w3-btn-block w3-section" title="Decline"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
          
            <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
                <p>ADS</p>
            </div>
            <br>
          
            <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
                <p><i class="fa fa-bug w3-xxlarge"></i></p>
            </div>
          
        <!-- End Right Column -->
        </div>
        
    <!-- End Grid -->
    </div>
  
<!-- End Page Container -->
</div>
<br>


<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Neil Hsieh Blog</h5>
</footer>

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

function emterKey(){
    if(event.keycode == 13){
        document.getElementById('ms_guest_bt').submit();
    }
}
</script>

</body>
</html>

