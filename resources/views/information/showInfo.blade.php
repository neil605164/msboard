@extends('layouts.information')

@section('showInfo')
<div class="w3-center" style="position: relative;">
	<div style="max-width:430px; " class="w3-content">
		

		<form method="POST" name="showform" action="{{ url('/postInfo') }}" class="w3-container" id="showInfo" enctype="multipart/form-data" onsubmit="return verify()">
			{{ csrf_field() }}
			
				
				<div class="w3-padding w3-left" >

					<p>
					<label>大頭貼:</label>
					</p>

					@if(isset($photos))
						<img src="{{ url('../storage/app/' . $photos->path) }}" width="300px" height="200px" style="border: 5px solid; border-radius: 12px"">
					@else
						<img alt="尚未上傳圖片" width="300px" height="200px" style="border: 5px solid; border-radius: 12px"">
					@endif
					

				</div>

				<div class="w3-padding w3-left">

					<label>部落格名稱:</label>
					@if(count($infos) == 0)
						<input type="text" name="name" >
					@else
						@foreach($infos as $info)
							<input type="text" name="name" value="{{ $info->name }}">
						@endforeach
					@endif
					
				</div>
				
				<div class="w3-padding w3-left">

					<label>部落格描述:</label>
					@if(count($infos) == 0)
						<textarea rows="4" cols="20" name="discription" ></textarea>
					@else
						@foreach($infos as $info)
							<textarea rows="4" cols="20" name="discription" >{{ $info->discription }}</textarea>
						@endforeach
					@endif
					
				</div>

				<div class="w3-padding w3-left">

					<label>上傳相片:</label>
					<input type="file" name="photo" >
					
				</div>
				
				<div class="w3-padding w3-left">

					<label>部落格分類:</label>

						<select name="type" >
						
							<?php $types=['','心情日記','職場甘苦','資訊科技','攝影寫真','休閒體育','寵物日記','不設分類'] ?>

							@if(count($infos) == 0)

								@foreach($types as $type)		
									<option  value="{{ $type }}">{{ $type }}</option>						
								@endforeach

							@else

								@foreach($types as $type)
									@if($info->type == $type)		
										<option  value="{{ $type }}" selected>{{ $type }}</option>
									@else
										<option  value="{{ $type }}" >{{ $type }}</option>
									@endif						
								@endforeach

							@endif

						</select>

				</div>
					
					<input type="hidden" name="user_id" value="{{ $users->id }}">
					@foreach($infos as $info)
					<input type="hidden" name="info_id" value="{{ $info->id }}">
					@endforeach
			
			<button form="showInfo" class="w3-btn w3-white w3-border w3-round-large w3-left" style="margin-left: 30px;" onclick="alert('修改成功')">送出</button>

			
		</form>

		
	</div>	
</div>


<!--驗證欄位必填的功能
<script type="text/javascript">
	function verify(form){
		if(name.value == ""){
			alert('請填寫部落格名稱');
			return false;
		}elseif(discription.value == ""){
			alert('請填寫部落格描述');
			return false;
		}else{
			alert('修改成功');
			return true;
		}
	}
</script>-->

@endsection