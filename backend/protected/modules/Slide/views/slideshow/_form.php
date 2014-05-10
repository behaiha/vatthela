<?php
/* @var $this SlideshowController */
/* @var $model Slideshow */
/* @var $form CActiveForm */
?>
<script>
    var x = 0;
    var y = 0;
    var z = 0;
    var images = [];
</script>
<div id="append"></div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slideshow-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php 
            $parents = Categories::model()->findAll('parent_id = 0');
            $data = Categories::model()->makeDropDown($parents);
        ?>
        <?php echo $form->dropDownList($model,'category_id',$data); ?>
    </div>
    
	<div class="row">
      <?php 
          $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
             'id'=>'image',
             'config'=>array(
                 'action'=>Yii::app()->createUrl('/Articles/createslide/upload'),
                 'allowedExtensions'=>array("jpg", "jpeg", "png", "gif"),
                 'sizeLimit'=>2*1024*1024,// maximum file size in bytes
                 'onSubmit'=>"js:function(file, extension) {           		
                	var createLi = 
                    '<li id=\"image-'+y+'\" style=\"position: relative; display: inline-block; float: left; width: 150px; height: 150px; border: 1px solid #E6E6E6; margin: 10px;\">'+
                        '<img src=\"".Yii::app()->theme->baseUrl."/images/loading.gif\" style=\"position: absolute; top: 50%; left: 50%; margin: -16px 0 0 -16px\"/>'+
                    '</li>';
        			$('#list-image').append(createLi);
        			y = y + 1;
              	 }",
              	'onComplete'=>"js:function(file, response, responseJSON) {
                    var createImage = 
                    '<div style=\"background-color: #8BC94C; display: block; width: 100%; height: 20px;\">'+
                        '<span style=\"float: right; padding-right: 10px;\">'+
                            '<a style=\"cursor: pointer;\" onclick=\"deleteImageAlbum('+z+');\" >x</a>'+
                        '</span>'+
                    '</div>'+
                    '<div style=\"position: relative; top: 20; left: 0; width: 100%; height: 130px; text-align: center;\">'+
                        '<img id=\"image'+z+'\" src=\"".Yii::app()->request->baseUrl.'/'.TEMP_IMAGE."'+responseJSON[\"filename\"]+'\" style=\"max-height: 100%; max-width: 100%; position: absolute; top: 0; bottom: 0; margin: auto; left: 0; right: 0;\">'+
                    '</div>';
                    
                    $('#image'+z).attr('style')
                    $('#image-'+z).html(createImage);
                    z = z + 1;
                    console.log(responseJSON[\"filename\"]);
                    images.push({
                        image : responseJSON[\"filename\"],
                        type : 1,
                    });
                }",
              )
        ));
        echo $form->hiddenField($model,'image');
      ?>
        <div id='preview-image'>
        	<ul id="list-image">
        		
        	</ul>
        </div>
        <div style="width: 100%; clear: both;"></div>
        <div class="row1">
            <a onclick="submit_slide();" style="cursor: pointer;" class="myButton">Create</a>
            <img id="loading" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/loading.gif"/>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
  function deleteImageAlbum(del){
        images[del].type = 0;
        $("#image-"+del).remove();
  }
  function submit_slide(){
        var category_id = $("#Slideshow_category_id").val();
        jQuery.ajax({
            type: 'POST',
            beforeSend: function(){
                document.getElementById('loading').style.display = 'block';
            },
            url: '<?php echo Yii::app()->createUrl('/Slide/slideshow/saveimages'); ?>',
            data: {data : JSON.stringify(images),category_id : category_id},
            success: function(data){
                $("#append").html(data);
                document.getElementById('loading').style.display = 'none';
                console.log(images);
            }
        });
  }
</script>
<style>
    .myButton {
        
        -moz-box-shadow:inset 0px 1px 0px 0px #ffe0b5;
        -webkit-box-shadow:inset 0px 1px 0px 0px #ffe0b5;
        box-shadow:inset 0px 1px 0px 0px #ffe0b5;
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fbb450), color-stop(1, #f89306));
        background:-moz-linear-gradient(top, #fbb450 5%, #f89306 100%);
        background:-webkit-linear-gradient(top, #fbb450 5%, #f89306 100%);
        background:-o-linear-gradient(top, #fbb450 5%, #f89306 100%);
        background:-ms-linear-gradient(top, #fbb450 5%, #f89306 100%);
        background:linear-gradient(to bottom, #fbb450 5%, #f89306 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fbb450', endColorstr='#f89306',GradientType=0);
        
        background-color:#fbb450;
        
        -moz-border-radius:7px;
        -webkit-border-radius:7px;
        border-radius:7px;
        
        border:1px solid #c97e1c;
        
        display:inline-block;
        color:#ffffff;
        font-family:Trebuchet MS;
        font-size:17px;
        font-weight:bold;
        padding:6px 11px;
        text-decoration:none;
        
        text-shadow:0px 1px 0px #8f7f24;
        
    }
    .myButton:hover {
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f89306), color-stop(1, #fbb450));
        background:-moz-linear-gradient(top, #f89306 5%, #fbb450 100%);
        background:-webkit-linear-gradient(top, #f89306 5%, #fbb450 100%);
        background:-o-linear-gradient(top, #f89306 5%, #fbb450 100%);
        background:-ms-linear-gradient(top, #f89306 5%, #fbb450 100%);
        background:linear-gradient(to bottom, #f89306 5%, #fbb450 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f89306', endColorstr='#fbb450',GradientType=0);
        
        background-color:#f89306;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }
</style>