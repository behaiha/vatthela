var domain = "http://localhost/giaingoaihang/";
var txt = jQuery('#input-comments');
    hiddenDiv = jQuery(document.createElement('div'));
    content = null;

	txt.addClass('txtstuff');
	hiddenDiv.addClass('hiddendiv common');

	jQuery('body').append(hiddenDiv);

	txt.on('keyup', function () {

	    content = jQuery(this).val();

	    content = content.replace(/\n/g, '<br>');
	    hiddenDiv.html(content + '<br class="lbr">');
	    height = hiddenDiv.height() > 40 ? hiddenDiv.height() : 40;
	    jQuery(this).css('height', height);

	});
	jQuery('.status-post').click(function() {
		jQuery('.types').slideToggle();
	});