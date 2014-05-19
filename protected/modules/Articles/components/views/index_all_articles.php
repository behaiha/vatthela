<div id="filter-container" class="cf">
    <?php 
        foreach ($model as $value) { 
            $this->widget('Articles.components.Index_One_Articles',array('value'=>$value));
        }
    ?>       

</div><!-- ENDS Filter container -->
<style type="text/css">
  #filter-container{

  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    $(window).scroll(function(){
      
      if  ($(window).scrollTop()  >=  $(document).height() - $("footer").height() - $(window).height()){
        console.log('a');
          $.ajax({
                  type: "POST",
                  url: '<?php echo Yii::app()->createUrl("/Articles/default/load"); ?>',
                  // data: {stt:$('#hiddenaddA').val(),
                  // cache: false,
                  success: function(data){
                    var items = [];
                    $.each(data, function(index, value) {
                      d=document.createElement('figure');
                      console.log(value);   
                      $(d).addClass('cate3');
                      str = '<a href="project.html" class="thumb"><img src="'+value.image+'" alt="alt"></a><figcaption><a href="project.html"><h3 class="heading">'+value.title+'</h3></a>'+value.short_description+'</figcaption>';
                      d.innerHTML =str;
                      items.push(d);
                    });
                    $('#filter-container').append($(items)).isotope( 'appended', $(items) );
                  }
              });
      }
    }); 
  });
</script>