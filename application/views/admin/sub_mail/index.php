<div class="cluster">
	<div class="container-fluid">
		<div class="tool-bar clearfix">
			<h1 class="page-title">
				Đăng Ký Mail
				<div class="pull-right">
					<ul class="action-icon-list">
						<li><a href="#" class="btn-export"><i class="fa fa-download" aria-hidden="true"></i> Xuất file</a></li>
						<li><a href="#" class="btn-publish"><i class="fa fa-eye" aria-hidden="true"></i> Khóa</a></li>
						<li><a href="#" class="btn-unpublish"><i class="fa fa-eye-slash" aria-hidden="true"></i> Mở Khóa</a></li>
						<li><a href="#" class="btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></li>
					</ul>
				</div>
			</h1>
		</div>
		<? if (empty($items) || !sizeof($items)) { ?>
		<p class="help-block">No item found.</p>
		<? } else { ?>
		<form id="frm-admin" name="adminForm" action="" method="POST">
			<input type="hidden" id="task" name="task" value="">
			<input type="hidden" id="boxchecked" name="boxchecked" value="0" />
			<table class="table table-bordered">
				<tr>
					<th class="text-center" width="30px">#</th>
					<th class="text-center" width="30px">
						<input type="checkbox" id="toggle" name="toggle" onclick="checkAll('<?=sizeof($items)?>');" />
					</th>
					<th>Mail Đã đăng ký</th>
					<th width="150px">Ngày đăng ký</th>
				</tr>
				<?
					$i = 0;
					foreach ($items as $item) {
				?>
				<tr class="row<?=$item->active?>">
					<td class="text-center">
						<?=($i + 1) + (($page - 1) * ADMIN_ROW_PER_PAGE)?>
					</td>
					<td class="text-center">
						<input type="checkbox" id="cb<?=$i?>" name="cid[]" value="<?=$item->id?>" onclick="isChecked(this.checked);">
					</td>
					<td>
						<a class="<?=($item->active?"text-color-grey":"")?>"><?=$item->email?></a>
						<ul class="action-icon-list">
							<li><a href="#" onclick="return confirmBox('Delete items', 'Are you sure you want to delete the selected items?', 'itemTask', ['cb<?=$i?>', 'delete']);"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></li>
							<? if ($item->active) { ?>
							<li><a href="#" onclick="return itemTask('cb<?=$i?>','unpublic');"><i class="fa fa-eye" aria-hidden="true"></i> Khóa</a></li>
							<? } else { ?>
							<li><a href="#" onclick="return itemTask('cb<?=$i?>','public');"><i class="fa fa-eye-slash" aria-hidden="true"></i> Mở khóa</a></li>
							<? } ?>
						</ul>
					</td>
					<td>
						<div class="action-icon-list"><span class="text-color-grey"><?=date($this->config->item("log_date_format"), strtotime($item->created_date))?></span></div>
					</td>
				</tr>
				<?
						$i++;
					}
				?>
			</table>
			<div><?=$pagination?></div>
		</form>
		<? } ?>
	</div>
</div>
<script>
$(document).ready(function() {
	jQuery.noConflict();
	$(".btn-export").click(function(e){
		submitButton("export");
	});
	$(".btn-publish").click(function(e){
		e.preventDefault();
		if ($("#boxchecked").val() == 0) {
			messageBox("ERROR", "Error", "Please make a selection from the list to publish.");
		}
		else {
			submitButton("public");
		}
	});
	$(".btn-unpublish").click(function(e){
		e.preventDefault();
		if ($("#boxchecked").val() == 0) {
			messageBox("ERROR", "Error", "Please make a selection from the list to unpublish.");
		}
		else {
			submitButton("unpublic");
		}
	});
	$(".btn-delete").click(function(e){
		e.preventDefault();
		if ($("#boxchecked").val() == 0) {
			messageBox("ERROR", "Error", "Please make a selection from the list to delete.");
		}
		else {
			confirmBox("Delete items", "Are you sure you want to delete the selected items?", "submitButton", "delete");
		}
	});
});
</script>