<script>
$(document).ready(function() {
	<? if ($this->session->flashdata("error")) { ?>
		messageBox("ERROR", "Xảy ra lỗi", '<?=$this->session->flashdata("error")?>');
	<? } else if ($this->session->flashdata("success")) { ?>
		messageBox("SUCCESS", "Thành công", '<?=$this->session->flashdata("success")?>');
	<? } else if ($this->session->flashdata("info")) { ?>
		messageBox("INFO", "Thành công", '<?=$this->session->flashdata("info")?>');
	<? } ?>
});
</script>