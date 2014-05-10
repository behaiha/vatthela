<style>
    .khung-anh{
        overflow: hidden;
        position: relative;
        display: inline-grid;
        float: left;
        width: 130px;
        height: 130px;
        border: 1px solid #E6E6E6;
        margin: 10px;
        z-index: 900;
        text-align: center;
        line-height: 130px;
    }
    .khung-anh>img{
        display: inline-block;
    }
    
    .khung-anh:hover .icon-del{
        display: block;
    }
    
    .icon-del{
        cursor: pointer;
        display: none;
        position: absolute;
        right: 0;
        top : 0;
        z-index : 1000;
        width: 20px;
        height: 20px;
    }
    .icon-del>img{
        width: 20px;
        height: 20px;
    }
    .append-image{
        position: absolute;
        top: 0;
        left: 0;
        width: 130px;
        height: 130px;
        text-align: center;
    }
    .append-image>img{
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
<?php
/* @var $this CreateslideController */
/* @var $model GameImage */
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
	'id'=>'game-image-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
      <?php 
          $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
             'id'=>'image',
             'config'=>array(
                 'action'=>Yii::app()->createUrl('/Articles/createslide/upload'),
                 'template'=>'<div class="qq-uploader">
                                <div class="qq-upload-drop-area">
                                    <span>Drop files here to upload</span>
                                </div>
                                <div class="qq-upload-button">Upload a file</div>
                                <ul class="qq-upload-list"></ul>
                            </div>',// Template buttom up image
                 'allowedExtensions'=>array("jpg", "jpeg", "png", "gif"),
                 'sizeLimit'=>2*1024*1024,// maximum file size in bytes
                 'onSubmit'=>"js:function(file, extension) {           		
                	var createLi = 
                    '<li id=\"image-'+y+'\" class=\"khung-anh\">'+
                        '<img src=\"".Yii::app()->theme->baseUrl."/images/loading.gif\"/>'+
                    '</li>';
        			$('#list-image').append(createLi);
	    	    	y = y + 1;
              	 }",
              	'onComplete'=>"js:function(file, response, responseJSON) {
              	     var createImage = 
                       '<a class=\"icon-del\" onclick=\"deleteImageAlbum('+z+');\">'+
                            '<img src=\"".Yii::app()->theme->baseUrl."/images/delete.png\"/>'+
                        '</a>'+
                        '<div class=\"append-image\">'+
                            '<img id=\"image'+z+'\" src=\"".Yii::app()->baseUrl."/".TEMP_IMAGE."'+ responseJSON[\"filename\"] +'"."\" />'+ 
                        '</div>';                                        
                    $('#image-'+z).html(createImage);
                    setTimeout(function(){
                        // alert(window.z);
                        var w = $('#image'+window.z).width(), h = $('#image'+window.z).height();
                        if (w>h){
                            //alert('w>h'); 
                            $('#image'+window.z).css('height', '130px');
                        } else {
                            //alert('h>w'); 
                            $('#image'+window.z).css('width', '130px');
                        };
                        window.z = window.z + 1;
                    },500);".                    
                "}",
              )
                        /*
                        src=\"".Yii::app()->baseUrl."/".TEMP_IMAGE."'+ responseJSON[\"filename\"] +'"."\"
                        var returnObject = {};
                        if(this.width > this.height){
                            returnObject.height = height;
                        }else{                            
                            returnObject.width = width;
                        }
                        alert(this.width + 'x' + this.height);
                        return returnObject;*/
        )); 
     
        
        echo $form->hiddenField($model,'image');
        //echo "<img id='thumb' src='/images/path/".$model->photos."'>";
      ?>
        <div id='preview-image'>
        	<ul id="list-image">
        		
        	</ul>
        </div>
    </div>
    <div style="width: 100%; clear: both;"></div>
    <div class="row1">
        <a onclick="submit1();" style="cursor: pointer;" class="myButton">Create</a>
        <img id="loading" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/loading.gif"/>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
  function deleteImageAlbum(del){
        images[del].type = 0;
        $("#image-"+del).remove();
  }
  function submit1(){
        jQuery.ajax({
            type: 'POST',
            beforeSend: function(){
                document.getElementById('loading').style.display = 'block';
            },
            url: '<?php echo Yii::app()->createUrl('/Articles/createslide/saveimages',array('id'=>$_GET['id'])); ?>',
            data: {data : JSON.stringify(images)},
            success: function(data){
                $("#append").html(data);
                document.getElementById('loading').style.display = 'none';
                console.log(images);
            }
        });
  }
</script>
<style>
    /**End css up anh cua Minh Tien**/
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