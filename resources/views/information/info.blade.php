<div class="w3-container">


    <h4 class="w3-center">My Photo</h4>
    @if(isset($photos))
    		<p class="w3-center"><img src="{{ url('../storage/app/' . $photos->path) }}" width="300px" height="200px" style="border: 5px solid; border-radius: 12px""></p>
    @else
    		<p class="w3-center"><img alt="尚未上傳圖片" width="300px" height="200px" style="border: 5px solid; border-radius: 12px""></p>
    @endif
    <hr>

    @foreach($infos as $info)
    	{{ $info->name }}
    @endforeach
    <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UIUX</p>
    <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
    <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>

    @if(!auth::guest())
        <a href="{{ url('/showInfo') }}"><i class="fa fa-pencil fa-fw w3-margin-bottom" title="edit" style="margin-left: 290px;"></i></a>
    @endif

</div>

