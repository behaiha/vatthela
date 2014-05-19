<div id="filter-container" class="cf">
    <?php 
        $idCategory = '';
        foreach ($model as $value) { 
          $idCategory .= $value->id.',';
          $this->widget('Articles.components.Index_One_Articles',array('value'=>$value));
        }
    ?>       
</div><!-- ENDS Filter container -->
<input type='hidden' id="id_category" value="<?php echo $idCategory; ?>">
<script type="text/javascript">
  $(document).ready(function() {
    $(window).scroll(function(){
      if  ($(window).scrollTop()  >=  $(document).height() - $("footer").height() - $(window).height()){
          $.ajax({
                  type: "GET",
                  url: '<?php echo Yii::app()->createUrl("/Articles/default/load"); ?>',
                  data: {IdCategory:$('#current-category').val(),DataArticles:$('#id_category').val()},
                  // cache: false,
                  success: function(data){
                    var items = [];
                    $.each(data, function(index, value) {
                      d=document.createElement('figure');
                      console.log(value);   
                      $(d).addClass(value.figure);
                      str = '<a href="'+value.link+'" class="thumb"><img src="'+value.image+'" alt="alt"></a><figcaption><a href="project.html"><h3 class="heading">'+value.title+'</h3></a>'+value.short_description+'</figcaption>';
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