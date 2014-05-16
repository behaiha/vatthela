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
                  // data: {stt:$('#hiddenaddA').val()},
                  // cache: false,
                  success: function(data){
                  	// count = parseInt($('#hiddenaddA').val()) +  1;
                    // $('#hiddenaddA').val(count);
                    // $('#filter-container').append('<div style="clear:both;"></div>');
                    $('#filter-container').append(data);
                  },
          		});
			}
		}); 
	});
</script>