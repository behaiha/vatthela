    <h1>Thông tin tài khoản chung</h1>
    <div class="use_hr_for"></div>
<div id="usr_info" class="usr-form">
    <div class="user-info">
      <div class="use-about">Tên</div>
      <div id="usr-name" class="usr-infomation"><?php echo $model->lname.' '.$model->fname; ?></div>
    </div>
    <div class="user-info">
      <div class="use-about">Giới tính</div>
      <div id="usr-gender" class="usr-infomation"><?php if($model->gender == 1) echo "Nam"; else echo "Nữ"; ?></div>
    </div>
    <div class="user-info">
      <div class="use-about">Ngày sinh</div>
      <div id="usr-dateofbirth" class="usr-infomation"><?php echo $model->dateofbirth; ?></div>
    </div>
    <div class="usr-change-info">
        <a id="user-a-info" href="javascript::void(0)" onclick="$('#use-change-acc').slideToggle();">Chỉnh sửa</a>
    </div>
    <div class="use_hr"></div>
</div>
<div class="use-change" id="use-change-acc" style="display:none;overflow: hidden;">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'info-Members-form',
    'enableClientValidation'=>false,
    'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
    
)); ?>
    <h1 style="margin-bottom: 17px;">Thay đổi thông tin cá nhân</h1>
    <h2 id="use-info-error" style="color: red;text-align: center;margin-left: -39px;"></h2>
    <div class="row">
        <?php echo $form->labelEx($model,'lname',array('class'=>'use-label')); ?>
        <?php echo $form->textField($model,'lname',array('class'=>'use-input use-input-add')); ?>
        <?php echo $form->error($model,'lname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'fname',array('class'=>'use-label')); ?>
        <?php echo $form->textField($model,'fname',array('class'=>'use-input use-input-add')); ?>
        <?php echo $form->error($model,'fname',array('class'=>'use-info-error')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'gender',array('class'=>'use-label')); ?>
        <?php echo $form->dropDownList($model,'gender',array('1'=>'Nam','2'=>'Nữ'),array('prompt'=>'Chọn giới tính','class'=>'use-input use-select-add')); ?>
        <?php echo $form->error($model,'gender'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'dateofbirth',array('class'=>'use-label')); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
              array(
                'name'=>'Members[dateofbirth]',
                'language' => 'vi',
                'value'=>date('d-m-Y'),
                'options'=>array(
                      'showAnim'=>'fold',
                      'minDate'=>'new Date()',
                      'dateFormat' => "dd-mm-yy",
                      'yearRange' => "0:+1",
                ),
                'htmlOptions'=>array(
                  'class'=>'use-input use-input-add',
                ),
              )
      );?>
        <?php echo $form->error($model,'dateofbirth'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::Button('Thay đổi',array('class'=>"reg-submit use-submit",'id'=>'use-cha-acc','style'=>"margin-left: 230px;")); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<script type="text/javascript">
    $('#use-cha-acc').click(function() {
        $.ajax({
                  type: "POST",
                  dataType:'json',
                  url: "<?php echo Yii::app()->createUrl('/Users/profiles/info');?>",
                  data:$("#info-Members-form").serialize(),
                  beforeSend:function(data) {
                  },  
                  success: function(data){
                    if (data.status == "success") {
                        $('#usr-name').html(data.name);
                        $('#usr-gender').html(data.gender);
                        $('#usr-dateofbirth').html(data.date);
                        $('#use-change-acc').slideToggle();
                    }else if (data.status == "empty") {
                        console.log(data);
                        $('#use-info-error').html(data.error);
                    };
                  },
          });
    });
</script>
<div id="usr_account" class="usr-form">
  <div class="user-info">
    <div class="use-about">Email</div>
    <div id="usr-email" class="usr-infomation"><?php echo $model->email; ?></div>
  </div>
  <div class="user-info">
    <div class="use-about">Tên đăng nhập</div>
    <div id="usr-email" class="usr-infomation"><?php echo $model->username; ?></div>
  </div>
    <div class="usr-change-info">
        <?php 
            echo CHtml::ajaxLink(
                      "Chỉnh sửa",
                      Yii::app()->createUrl('/Users/profiles/changeemail'),
                      array( // ajaxOptions
                        'type' =>'POST',
                        'success' => 'function(data)
                          {
                            $("#use-change-info").html(data);
                            $("#use-change-info").slideToggle();
                          }',
                      ),
                      array('href'=>"javascript::void(0);")
                    );
         ?>
    </div>
    <div class="use_hr"></div>
</div>
<div class="use-change" id="use-change-info" style="overflow: hidden;" >

</div>
<div id="usr_account" class="usr-form">
    <div class="use-about">Mật khẩu</div>
    <div id="usr-email" class="usr-infomation">Mật khẩu</div>
    <div class="usr-change-info">
        <?php 
            echo CHtml::ajaxLink(
                      "Chỉnh sửa",
                      Yii::app()->createUrl('/Users/profiles/changepassword'),
                      array( // ajaxOptions
                        'type' =>'POST',
                        'success' => 'function(data)
                          {
                            $("#use-change-pas").html(data);
                            $("#use-change-pas").slideToggle();
                          }',
                      ),
                      array('href'=>"javascript::void(0);")
                    );
         ?>
    </div>
    <div class="use_hr"></div>
</div>
<div class="use-change" id="use-change-pas" style="overflow: hidden;" >

</div>
<div class="use_hr_for"></div>
