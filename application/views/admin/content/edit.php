<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title"><?=$category->name?></h1>
		<form id="frm-admin" name="adminForm" action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="task" name="task" value="">
			<div class="text-right">
				<button class="btn btn-sm btn-primary btn-save">Save</button>
				<button class="btn btn-sm btn-default btn-cancel">Cancel</button>
			</div><br>
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Title</td>
					<td><input type="text" id="title" name="title" class="form-control" value="<?=!empty($item->title) ? $item->title : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">URL alias</td>
					<td><input type="text" id="alias" name="alias" class="form-control" value="<?=!empty($item->alias) ? $item->alias : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right">Categories</td>
					<td>
						<select id="parent_id" name="parent_id" class="form-control">
							<?
							$info = new stdClass();
							$info->parent_id = $category->parent_id;
							$categories = $this->m_content_categories->items($info,1);
							foreach ($categories as $cate) { ?>
							<option value="<?=$cate->id?>"><?=$cate->name?></option>
							<? } ?>
						</select>
						<script type="text/javascript">
							$("#parent_id").val("<?=$category->id?>");
						</script>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Thumbnail</td>
					<td>
						<label class="wrap-upload-thumb" style="background: url('<?=BASE_URL?><?=!empty($item->thumbnail) ? $item->thumbnail : ''?>') no-repeat">
							<input type="file" name="thumbnail" id="file-upload" value="<?=!empty($item->title) ? $item->title : ''?>">
							<i class="fa fa-cloud-upload" aria-hidden="true"></i>
						</label>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Description</td>
					<td><textarea id="editor1" name="description" class=" form-control editor" rows="10"><?=!empty($item->description) ? $item->description : ''?></textarea></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">Content</td>
					<td><textarea id="content" name="content" class="tinymce form-control" rows="20"><?=!empty($item->content) ? $item->content : ''?></textarea></td>
				</tr>
				<tr>
				<td class="table-head text-right" width="10%">SEO</td>
					<td>
						<div class="seo-panel">
							<p class="title"><input type="text" id="meta_title" name="meta_title" class="form-control seo-control" maxlength="70" value="<?=$item->meta_title?>" placeholder="Title..."></p>
							<p class="url"><?=BASE_URL?>/.../<?=$item->alias?>.html</p>
							<p class="keywords"><input type="text" id="meta_key" name="meta_key" class="form-control seo-control" maxlength="255" value="<?=$item->meta_key?>" placeholder="Keywords..."></p>
							<p class="description"><input type="text" id="meta_des" name="meta_des" class="form-control seo-control" maxlength="160" value="<?=$item->meta_des?>" placeholder="Description..."></p>
						</div>
					</td>
				</tr>
				<tr>
					<td class="table-head text-right">Status</td>
					<td>
						<select id="active" name="active" class="form-control">
							<option value="1">Show</option>
							<option value="0">Hide</option>
						</select>
						<script type="text/javascript">
							$("#active").val("<?=$item->active?>");
						</script>
					</td>
				</tr>
			</table>
		</form>
		<br>
	</div>
</div>
 
<script src="<?=JS_URL?>ckeditor.js"></script>
<script src="<?=BASE_URL?>/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'editor1' );
CKEDITOR.config.extraPlugins='colorbutton';
CKFinder.setupCKEditor( editor );
// ClassicEditor
// 	.create( document.querySelector( '.editor' ), {
// 		ckfinder: {
// 			uploadUrl: '<?//=BASE_URL?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
// 		},
// 		toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
// 	} )
// 	.catch( function( error ) {
// 		console.error( error );
// 	} );

</script>
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