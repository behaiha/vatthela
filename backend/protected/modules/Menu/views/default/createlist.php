<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
  var arrayData = [];
  var index = 0;
</script>
<div class="form">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mjs.nestedSortable.js"></script>
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'menu-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
)); ?>
  <h1>Tạo danh sách menu</h1>
  <h1 style="margin-left: 66px;">Danh sách menu</h1>
  <h1 style="margin-left: 100px;">Giá trị</h1>
  <div style="clear:both;"></div>

  <div id="accordion" class="views">
    <h3>Text</h3>
    <div class="div-text">
      <p>Url</p>
      <input class="text-input url-link" placeholder="http://"  id="ip-url" type="text" value="">  
      <p>Hiển thị </p>
      <input class="text-input url-text" placeholder="Hiển thị text" id="ip-text" type="text" value="">  
      <button id="add_menu_text">Thêm vào menu</button>
    </div>
    <h3>Category</h3>
    <div>
      <?php foreach($categories as $cate): ?>
        <div>
          <input type="checkbox" name="cate[]" class='cate-checkbox' data-status="0" data-text="<?php echo $cate->title; ?>" value="<?php echo $cate->id; ?>">&nbsp;<?php echo $cate->title; ?><br>
        </div>
      <?php endforeach; ?>
      <button id="add_menu_cate">Thêm vào menu</button>
    </div>
  </div>

  <?php $this->renderPartial('sortable', array('model'=>$model)); ?>
  <div class="values" style="display:none;">
    <p class="type">Loại menu</p>
    <div class="div-text">
      <p>Url</p>
      <input class="text-input url-link" placeholder="http://"  id="change-url" type="text" value="">  
      <p>Hiển thị </p>
      <input class="text-input url-text" placeholder="Hiển thị text" id="change-text" type="text" value="">  
      <button id="delete_menu">Xóa</button>
      <button id="edit_menu_text">Chỉnh sửa</button>
    </div>
  </div>
<div style="clear:both;"></div>
  <div class="row buttons">
    <button id="save">Lưu</button>
    <p class="p-save">Đã lưu thành công</p>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
 <script>
 $( "#accordion" ).accordion();
  $(function() {
      $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div'
        });
  })
  $("button").button().click(function( event ) {
        event.preventDefault();
      });
  $('.div-text').css({'height': ''});
  $('#add_menu_text').click(function(event) {
    var urtText = $('.url-text').val();
    var urlLink = $('.url-link').val();
    if (urlLink != '' && urtText != '') {
        var str = 'data-url="'+urlLink+'" data-type="L" data-text="'+urtText+'"';
        var text = '<li id="list_4" '+str+'  value="'+index+'"><div onclick="clickLi($(this));"><span class="disclose"><span></span></span>'+urtText+'</div>';
        $('.sortable').append(text);
         $('.url-text').val('');$('.url-link').val('');
    };
  });
  $('#add_menu_cate').click(function(event) {
    $.each($('.cate-checkbox:checked'), function(index, val) {
      status = val.getAttribute('data-status');
      urtText = val.getAttribute('data-text');
      urlLink = val.value;
      var str = 'data-url="'+urlLink+'" data-type="C" data-text="'+urtText+'"';
      var text = '<li id="list_4" '+str+'  value="'+index+'"><div onclick="clickLi($(this));"><span class="disclose"><span></span></span>'+urtText+'</div>';
      $('.sortable').append(text);
      val.parentNode.remove()
    });
  });
  var t;
  function clickLi (l) {
    $('ol li div').removeClass('item-selected');
    l.addClass('item-selected');
    t = l.parent();
    if (t.attr('data-type') == "C") {
      $('.type').html('Menu category');
    }else{
      $('.type').html('Menu text');
    }
    $('#change-text').val(t.attr('data-text'));
    $('#change-url').val(t.attr('data-url'));
    $('.values').fadeIn();
  }
  $('#delete_menu').click(function(event) {
      if (t != null) {
        if (confirm("Bạn có muốn xóa menu hay không?")) {
            t.remove();
            $('.values').fadeOut();
        };
      };
  });
  $('#edit_menu_text').click(function(event) {
    if (t != null) {
        t.attr('data-text',$('#change-text').val());
        if (t.attr('data-type') == "L") {
          t.attr('data-url',$('#change-url').val());        
        };
        s = '<span class="disclose"><span></span></span>'+$('#change-text').val();
        $('#change-text').val('');
        $('#change-url').val('');
        t.find('div').html(s);
        // t = null;
    };
  });
  $('#save').click(function(event) {
    arrayData = [];
    var obj = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
    var jsObj = $('ol li[data-text]');
    console.log('get values');
    $.each(obj, function(index, val) {
      console.log(index);
      if (val.item_id != null) {
        idx = index - 1;
        var item ={'text':'','value':'','parent':0,'type':''};
        item.text = jsObj.get(idx).getAttribute('data-text');
        item.value = jsObj.get(idx).getAttribute('data-url');        
        item.type = jsObj.get(idx).getAttribute('data-type');        
        for(var i = idx; i>0; --i){
          if ((obj[i].left < obj[index].left) && (obj[i].right > obj[index].right)) {
            item.parent = i;
            break;
          }
        }
        arrayData.push(item);
        // console.log(val,val.right,item); 

      };
    });
    $.ajax({
      url: '<?php echo Yii::app()->createUrl("Menu/default/createmenu"); ?>',
      type: 'POST',
      data: {data: JSON.stringify(arrayData),id:<?php echo $model->id; ?>},
      success:function() {
        $('.p-save').fadeIn();
      }
    });
    
  });
  </script>
<style type="text/css">
  .p-save{
    color: rgb(243, 63, 77);
    font-weight: bold;
    display: none;
  }
  .item-selected{
    background: rgb(128, 240, 112) !important;
  }
  .values{
    float: right;
    margin-right: -33px;
  }
  h1{
    float: left;
  }
  .text-input {
    display: block;
    width: 192px;
    height: 23px;
    padding: 6px 12px;
    vertical-align: middle;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  }
  #accordion{
    width: 300px;
    float: left;
  }
  .form{width: 800px;}
</style>
<style type="text/css">
    .views{
      float: left;
    }
    a, a:visited {
      color: #4183C4;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    pre, code {
      font-size: 12px;
    }

    pre {
      width: 100%;
      overflow: auto;
    }

    small {
      font-size: 90%;
    }

    small code {
      font-size: 11px;
    }

    .placeholder {
      outline: 1px dashed #4183C4;
    }

    .mjs-nestedSortable-error {
      background: #fbe3e4;
      border-color: transparent;
    }

    ol {
      margin: 0;
      padding: 0;
      padding-left: 30px;
    }

    ol.sortable, ol.sortable ol {
      margin: 0 0 0 25px;
      padding: 0;
      list-style-type: none;
    }

    ol.sortable {
      float: left;
      width: 192px;
      margin-left: 20px;
    }

    .sortable li {
      margin: 5px 0 0 0;
      padding: 0;
    }

    .sortable li div  {
      border: 1px solid #d4d4d4;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      border-color: #D4D4D4 #D4D4D4 #BCBCBC;
      padding: 6px;
      margin: 0;
      cursor: move;
      background: #f6f6f6;
      background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #ededed 100%);
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed));
      background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
      background: -o-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
      background: -ms-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
      background: linear-gradient(to bottom,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
    }

    .sortable li.mjs-nestedSortable-branch div {
      background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #f0ece9 100%);
      background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#f0ece9 100%);

    }

    .sortable li.mjs-nestedSortable-leaf div {
      background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #bcccbc 100%);
      background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#bcccbc 100%);

    }

    li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
      border-color: #999;
      background: #fafafa;
    }

    .disclose {
      cursor: pointer;
      width: 10px;
      display: none;
    }

    .sortable li.mjs-nestedSortable-collapsed > ol {
      display: none;
    }

    .sortable li.mjs-nestedSortable-branch > div > .disclose {
      display: inline-block;
    }

    .sortable li.mjs-nestedSortable-collapsed > div > .disclose > span:before {
      content: '+ ';
    }

    .sortable li.mjs-nestedSortable-expanded > div > .disclose > span:before {
      content: '- ';
    }

    dl {
      margin: 0;
    }

    dd {
      margin: 0;
      padding: 0 0 0 1.5em;
    }

    code {
      background: #e5e5e5;
    }

    input {
      vertical-align: text-bottom;
    }

    .notice {
      color: #c33;
    }

  </style>