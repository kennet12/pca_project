<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title"><?=$title?></h1>
		<form id="frm-admin" name="adminForm" action="" method="POST">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">Name</td>
					<td><input type="text" id="name" name="name" class="form-control" value="<?=!empty($item->name) ? $item->name : ''?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">URL alias</td>
					<td><input type="text" id="alias" name="alias" class="form-control" value="<?=!empty($item->alias) ? $item->alias : ''?>"></td>
				</tr>
				<? if ($this->router->fetch_method() == 'content_categories') { ?>
				<tr>
					<td class="table-head text-right" width="10%">Description</td>
					<td><textarea id="description" name="description" class=" form-control" rows="5"><?=!empty($item->description) ? $item->description : ''?></textarea></td>
				</tr>
				<? } ?>
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
			<div class="text-right">
				<button class="btn btn-sm btn-primary btn-save">Update</button>
				<button class="btn btn-sm btn-default btn-cancel">Cancel</button>
			</div>
		</form>
	</div>
</div>

<script>
$(document).ready(function() {
	$(".btn-save").click(function(){
		submitButton("save");
	});
	$(".btn-cancel").click(function(){
		submitButton("cancel");
	});
});
</script>