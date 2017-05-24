@extends('admin.master')
@section('title','Sửa tin tức')
@section('content')
<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<fieldset>
				<legend>Thông Tin Bản Tin</legend>
				<span class="form_label">Tên danh mục:</span>
				<span class="form_item">
					<select name="sltCate" class="select">
						<?php 	menuMulti($data_Cate,0,$str="|",$data_news["category_id"]) ;
					  ?>
					</select>
				</span><br />
				<span class="form_label">Tiêu đề tin:</span>
				<span class="form_item">
					<input type="text" name="txtTitle" class="textbox" value="{{ old('txtTitle',isset($data_news['title']) ? $data_news['title'] : null) }}" />
				</span><br />
				<span class="form_label">Tác gỉả:</span>
				<span class="form_item">
					<input type="text" name="txtAuthor" class="textbox" value="{{ old('txtAuthor',isset($data_news['author']) ? $data_news['author'] : null) }}"/>
				</span><br />
				<span class="form_label">Trích dẫn:</span>
				<span class="form_item">
					<textarea name="txtIntro" rows="5" class="textbox">{{ old('txtIntro',isset($data_news['intro']) ? $data_news['intro'] : null) }}</textarea>
					<script type="text/javascript">
					var editor = CKEDITOR.replace('txtIntro',{
						language:'vi',
						filebrowserImageBrowseUrl : '../../qt64_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : '../../qt64_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
						filebrowserImageUploadUrl : '../../qt64_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : '../../qt64_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</span><br />
				<span class="form_label">Nội dung tin:</span>
				<span class="form_item">
					<textarea name="txtFull" rows="8" class="textbox">{{ old('txtFull',isset($data_news['full']) ? $data_news['full'] : null) }}</textarea>
					<script type="text/javascript">
					var editor = CKEDITOR.replace('txtFull',{
						language:'vi',
						filebrowserImageBrowseUrl : '../../qt64_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : '../../qt64_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
						filebrowserImageUploadUrl : '../../qt64_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : '../../qt64_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</span><br />
				<span class="form_label">Hình hiện tại:</span>
				<span class="form_item">
					<img src="{!! isset($data_news['image']) ? asset('../../public/uploads/news/'.$data_news['image']) : asset('qt64_admin/templates/images/nophoto.png') !!}" width="100px" />
					<input type="hidden" name="fImageCurrent" value="{{ $data_news['image'] }}">
				</span><br />
				<span class="form_label">Hình đại diện:</span>
				<span class="form_item">
					<input type="file" name="newsImg" class="textbox" />
				</span><br />
				<span class="form_label">Công bố tin:</span>
				<span class="form_item">
					<input type="radio" name="rdoPublic" value="1""
					@if($data_news['status'] == 1)
						checked 
					@endif
					 /> Có 
					<input type="radio" name="rdoPublic" value="0" 
					@if($data_news['status'] == 0)
						checked 
					@endif
					/> Không
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnNewsEdit" value="Sửa tin" class="button" />
				</span>
			</fieldset>
		</form>
	@endsection