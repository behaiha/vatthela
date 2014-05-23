<ul class="user-info">
	<li class="avatar-user">
		<a href=""><img src="<?php echo $image; ?>"></a>
	</li>
	<li class="user-info-name">
		<p><?php echo Yii::app()->user->name; ?></p>
		<p>0 Xu</p>
	</li>
	<li class="activity-user">
		<span class="icon"></span>
		<ul class="activity">
			<li><a href="<?php echo Users::getUrlUser(); ?>">Trang cá nhân</a></li>
			<li><a href="">Trang fanpage</a></li>
			<li><a href="">Cài đặt</a></li>
		</ul>
	</li>
</ul>