<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title"><?=$title?></h1>
		<form id="frm-admin" name="adminForm" action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Tên danh mục</td>
					<td><input type="text" id="name" name="name" class="form-control" value="<?=!empty($item->name) ? $item->name : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">URL alias</td>
					<td><input type="text" id="alias" name="alias" class="form-control" value="<?=!empty($item->alias) ? $item->alias : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Ảnh đại diện</td>
					<td>
						<label class="wrap-upload-thumb" style="background: url('<?=BASE_URL?><?=!empty($item->thumbnail) ? $item->thumbnail : ''?>') no-repeat">
							<input type="file" name="thumbnail" id="file-upload" value="<?=!empty($item->name) ? $item->name : ''?>">
							<i class="fa fa-cloud-upload" aria-hidden="true"></i>
						</label>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Tên button</td>
					<td><input type="text" id="btn_text" name="btn_text" class="form-control" value="<?=!empty($item->btn_text) ? $item->btn_text : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Miêu tả</td>
					<td>
						<textarea id="description" name="description" class="tinymce form-control" rows="20"><?=!empty($item->description) ? $item->description : ''?></textarea>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Nội dung</td>
					<td>
						<textarea id="content" name="content" class="tinymce form-control" rows="20"><?=!empty($item->content) ? $item->content : ''?></textarea>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right">Trạng thái</td>
					<td>
						<select id="active" name="active" class="form-control">
							<option value="1">Hiện</option>
							<option value="0">Ẩn</option>
						</select>
						<script type="text/javascript">
							$("#active").val("<?=$item->active?>");
						</script>
					</td>
				</tr>
			</table>
			<div class="text-right">
				<button class="btn btn-sm btn-primary btn-save">Cập nhật</button>
				<button class="btn btn-sm btn-default btn-cancel">Hủy bỏ</button>
			</div>
		</form>
	</div>
</div>

<script>
$(document).ready(function() {
	$("#file-upload").change(function() {
		readURL(this);
	});
	
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.wrap-upload-thumb').css({
					"background-image": "url('"+e.target.result+"')"
				});
				$('.wrap-upload-thumb > i').css({
					"color": "rgba(52, 73, 94, 0.38)"
				});
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(".btn-save").click(function(){
		submitButton("save");
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>