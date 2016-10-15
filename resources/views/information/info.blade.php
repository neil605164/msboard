@extends('layouts.main')

@section('information')

<div class="w3-container">

    <h4 class="w3-center">My Profile</h4>
    <p class="w3-center"><img src="img_avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
    <hr>

    <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
    <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
    <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>

    @if(!auth::guest())
        <a href="#"><i class="fa fa-pencil fa-fw w3-margin-bottom" title="edit" style="margin-left: 290px;"></i></a>
    @endif

</div>
@endsection   
