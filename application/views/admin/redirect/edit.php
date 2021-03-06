<div class="cluster">
	<div class="container-fluid">
		<h1 class="page-title">Page Redirects</h1>
		<? if (empty($item)) { ?>
		<p class="help-block">Item not found.</p>
		<? } else { ?>
		<form id="frm-admin" name="adminForm" action="" method="POST">
			<input type="hidden" id="task" name="task" value="">
			<table class="table table-bordered">
				<tr>
					<td class="table-head text-right" width="10%">From Url</td>
					<td><input type="text" id="from_url" name="from_url" class="form-control" value="<?=$item->from_url?>"></td>
				</tr>
				<tr>
					<td class="table-head text-right" width="10%">To Url</td>
					<td><input type="text" id="to_url" name="to_url" class="form-control" value="<?=$item->to_url?>"></td>
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
			<div>
				<button class="btn btn-sm btn-primary btn-save">Update</button>
				<button class="btn btn-sm btn-default btn-cancel">Cancel</button>
			</div>
		</form>
		<? } ?>
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