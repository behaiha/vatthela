<section id="main" class="prl-span-9">
	<?php $this->widget('Users.components.View_User_Thumbai',array('model'=>$model)); ?>
	<article id="article-single"> 
	<div class="prl-grid">	
    	<div class="view-show-post prl-span-9 prl-span-flip posts-users" id="content_tube" >
    		<?php $this->widget('Pages.components.View_Post_Status'); ?>
            <?php $this->widget('Pages.components.View_Show_All_Status'); ?>
	   </div>
	   <?php $this->widget('Users.components.View_Left_Sidebar'); ?>
    </div>
</article>
</section>
<script type="text/javascript">
    var t,statusShowEditPost = 0;
    jQuery('.edit-comment').click(function (e) {
        t = jQuery(this);
        statusShowEditPost = 1;
        t.css('display','inline');
        t.parent().find('.activity-post').slideToggle();
    })
    
    /**Edit một post**/
    /*jQuery('.edit-post-status').click(function (e) {
        t = jQuery(this);
        statusShowEditPost = 1;
        t.parent().find('.activity-post').slideToggle();
    })*/
    
    function edit_post(t){
        //t = jQuery(this);
        //console.log("a");
        statusShowEditPost = 1;
        console.log(statusShowEditPost);
        t.parent().find('.activity-post').slideToggle();
        //console.log("minh tien");
        //console.log("bien t:",t);
    }
    
    jQuery('body').click(function(e) {
        if (statusShowEditPost == 0) {
            jQuery('.activity-post').hide();
            jQuery('.edit-comment').hide();
            jQuery('.edit-comment').css('display','');
        };
        statusShowEditPost = 0;
    })

</script>
