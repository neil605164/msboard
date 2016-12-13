@extends('information.information')
@section('showInfo')

<div class="w3-center" style="position: relative;">

		
	<form method="POST" name="showPhoto" action="{{ url('/deletePhoto') }}" class="w3-container" id="showInfo" enctype="multipart/form-data" onsubmit="return verify()">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="DELETE">	

		<div  style="min-height: 500px; min-width: 500px; ">
			<div class="w3-left" >

			@if(isset($photos))
				@foreach($photos as $photo)
						<img src="{{ url('../storage/app/' . $photo->path) }}" alt="無法顯示圖片" width="300px" height="200px" style="border: 2px solid; border-radius: 5px; ">
						<input type="checkbox" name="check_array[]" value="{{ $photo->id }}" class='w3-center'>
				@endforeach
			@endif

			</div>
		</div>
		
		<button class="w3-btn w3-white w3-border w3-round-large w3-right" style="margin-left: 30px;">刪除</button>			
	</form>
		
</div>

@endsection