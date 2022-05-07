<? $fetch_method = $this->util->slug($this->router->fetch_method());?>
<div class="nav-account">
	<div class="container">
		<div class="info-account">
			<span><?=$this->session->userdata("user")->fullname?></span>
			<div class="rank">Xếp hạng: <i class="fas fa-award fa-award-<?=$user->user_rank?>"></i><span class="note-rank"><?
												if ($user->user_rank == 0) {
													echo 'Mới';
												} else if ($user->user_rank == 1) {
													echo 'Bạc';
												} else if ($user->user_rank == 2) {
													echo 'Vàng';
												} else if ($user->user_rank == 3) {
													echo 'Bạch Kim';
												} else if ($user->user_rank == 4) {
													echo 'Kim Cương';
												}
											?></span>
			</div>
			<div class="edit-line">
				<a href="<?=site_url("tai-khoan/thong-tin-tai-khoan")?>" class="editinfo"><i class="far fa-edit"></i> Sửa thông tin</a>
				<a href="<?=site_url("tai-khoan/dang-xuat")?>" class="editinfo"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="list clearfix">
			<div class="item <?=($fetch_method == 'lich-su-don-hang')?'active':''?>">
				<a href="<?=site_url("tai-khoan/lich-su-don-hang")?>">Lịch sử đơn hàng</a>
			</div>
			<div class="item <?=($fetch_method == 'san-pham-yeu-thich')?'active':''?>">
				<a href="<?=site_url("tai-khoan/san-pham-yeu-thich")?>">Sản phẩm yêu thích</a>
			</div>
			<div class="item <?=($fetch_method == 'doi-mat-khau')?'active':''?>">
				<a href="<?=site_url("tai-khoan/doi-mat-khau")?>">Đổi mật khẩu</a>
			</div>
		</div>
	</div>
</div>
