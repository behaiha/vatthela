<ul class="prl-list prl-list-sharing">
	<li class="header">SHARING</li>
    <li>
        <div class="fb-like" data-href="<?php echo Yii::app()->request->hostInfo.Yii::app()->createUrl('Artices/default/view',array('id'=>$model->id));?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
    </li>
	<li>
        <div class="fb-share-button" data-href="<?php echo Yii::app()->request->hostInfo.Yii::app()->createUrl('Artices/default/view',array('id'=>$model->id));?>" data-type="button_count"></div>
    </li>
	<li>
        <div class="g-plus" data-action="share" data-annotation="none"></div>
    </li>					
    
</ul>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Ð?t th? này sau th? chia s? cu?i cùng. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'vi'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>