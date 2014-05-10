<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/libs/tags/jquery.ptags.js"></script>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/libs/tags/jquery.ptags.default.css" rel="stylesheet" type="text/css" />
<div class="row">
	<label >Tags</label>
	<input type="text" id="tags" name="tags" value="<?php echo $value; ?>" style="width: 200px;"/>
</div>
<a href="javasrcipt:void(0);" onclick="$('#oldtags').show();">Hiển thị những tag đã có</a>
<div style="display: none;" id="oldtags">
	<?php foreach($tags as $tag): ?>
		<a href="javasrcipt:void(0);" onclick="selectTags('<?php echo $tag->name; ?>');"><?php echo $tag->name; ?></a>
	<?php endforeach; ?>
</div>
<script type="text/javascript">
	function selectTags (name) {
		str = $('#tags').val()+","+name;
		$('#tags').val(str);
	}
	var str;
		$(document).ready(function() {
			$("#tags").ptags();
		});
</script>