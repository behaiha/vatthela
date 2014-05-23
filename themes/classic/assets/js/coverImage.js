function CoverImage (data) {
	var statusUpimage = 0;
	var dataImage = null;
	var t = this;
	var maxHeight = 385,minHeight = 0;
	var hImg = '120%';
	var _startY = 0;
	var _offsetY = 0;
	var _dragElement;			// needs to be passed from OnMouseDown to OnMouseMove
	var _oldZIndex = 0;			// we temporarily increase the z-index during drag
	this.getMinHeight = function  () {
		if (jQuery(data.nameImg).height() <= maxHeight) {
			minHeight = jQuery(data.nameImg).height();
		}else{
			minHeight = maxHeight;
		}
		if (minHeight == 0) {
			minHeight =300;
		};
		return minHeight;
	}
	var hImage = t.getMinHeight();
	if (hImage <= maxHeight ) {
		hImage = maxHeight;
		jQuery(data.nameImg).css('height',hImg);
	};
	jQuery(data.nameDiv).css('height',hImage);
	this.TypeFile = function(){
	    var fup = document.getElementById(data.fileUpload);
	    var fileName = fup.value;
	    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	    if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "PNG" || ext == "png" )
	    {
	        return ext;
	    }
	}
	this.sendImages = function (ima) {
		jQuery.ajax({
		  url: data.urlUpImg,
		  type: 'POST',
		  data: {data: JSON.stringify(ima)},
		  success: function(a) {
		  	dataImage = a;
		  	console.log(a);
		  	if (a.width <= data.widthMin || a.height <= data.heightMin) {
		  		alert('Ảnh độ rộng tối thiểu 200px');
		  		return false;
		  	};
		  	if (jQuery(data.nameImg).attr('style') != '') {
		  		jQuery(data.nameImg).attr('style','');
		  	};
		    jQuery(data.nameImg).attr('src',a.linkI);
		    jQuery(data.buttonUpload).html('Lưu hình ảnh');
		    jQuery(data.buttonUpload).css('display','block');
		    jQuery(data.btnDelete).show();
		    jQuery(data.title).hide();
		    statusUpimage = 1;
		    height = jQuery(data.nameImg).width() * a.height / a.width;
		    console.log(height,maxHeight);
		    if (height <= minHeight) {
		    	height = minHeight;
		    	jQuery(data.nameImg).css('height',hImg);
		    };
		    if (height >= maxHeight) {
		    	height = maxHeight;
		    };
		    jQuery(data.nameDiv).css('height',height);
		    t.InitDragDrop();
		  },
		});
		
	}
	this.fileSelect = function (evt) {
	    if (window.File && window.FileReader && window.FileList && window.Blob) {

	        var files = evt.target.files;
	        var file;
	        for (var i = 0; file = files[i]; i++) {
	            if (!file.type.match('image.*')) {
	            	alert('Không phải image');
	            	return false;
	            }
	            if (file.size > data.sizeMax) {
	            	alert('Ảnh quá lớn');
	            	return false;
	            };
	            reader = new FileReader();
	            reader.onload = (function (tFile) {
	                return function (evt) {
	                	var type_image = t.TypeFile();
	                    var dataU = [];
	                    dataU.push({
			                image : evt.target.result,
			                type : type_image,
			            });
			            t.sendImages(dataU);
	                };
	            }(file));
	            reader.readAsDataURL(file);
	        }
	    } else {
	        alert('The File APIs are not fully supported in this browser.');
	    }
	}
	this.destroyDrag = function  () {
		document.onmousedown = null;
		document.onmouseup = null;
	}
	this.InitDragDrop = function ()
	{
		document.onmousedown = t.OnMouseDown;
		document.onmouseup = t.OnMouseUp;
	}

	this.OnMouseDown = function (e)
	{
		if (e == null) 
			e = window.event; 
		var target = e.target != null ? e.target : e.srcElement;
			// console.log(e.button,window.event);
		// for IE, left click == 1
		// for Firefox, left click == 0
		if ((e.button == 1 && window.event != null || e.button == 0) && target.className == 'drag'){
			// console.log(e.target);
			// grab the mouse position
			_startY = e.clientY;
			
			// grab the clicked element's position
			_offsetY = t.ExtractNumber(target.style.top);
			
			// bring the clicked element to the front while it is being dragged
			// _oldZIndex = target.style.zIndex;
			// target.style.zIndex = 10000;
			
			// we need to access the element in OnMouseMove
			this._dragElement = target;

			// tell our code to start moving the element with the mouse
			document.onmousemove = t.OnMouseMove;
			
			// cancel out any text selections
			document.body.focus();
			
			// prevent text selection in IE
			document.onselectstart = function () { return false; };
			// prevent IE from trying to drag an image
			target.ondragstart = function() { return false; };
			
			// prevent text selection (except IE)
			return false;
		}
	}

	this.ExtractNumber = function (value)
	{
		var n = parseInt(value);
		
		return n == null || isNaN(n) ? 0 : n;
	}

	this.OnMouseMove = function (e)
	{
		if (e == null) 
			var e = window.event; 
			var changY = _offsetY + e.clientY - _startY;
			var max = jQuery(data.nameImg).height() - 385;
			if((changY >= -max) && changY <= 0){
				this._dragElement.style.position = 'relative';
				this._dragElement.style.top = changY + 'px';
			}
	}

	this.OnMouseUp = function(e)
	{
		if (this._dragElement != null)
		{
			// we're done with these events until the next OnMouseDown
			document.onmousemove = null;
			document.onselectstart = null;
			this._dragElement.ondragstart = null;

			// this is how we know we're not dragging
			this._dragElement = null;
		}
	}
	this.deleteImage = function (image) {
		jQuery.ajax({
			url : data.urlDeImge,
			type : "POST",
			data:{name:image},
			success:function (result) {
				console.log('da xoa thanh cong');
			}
		});
	}
	jQuery(data.btnDelete).click(function() {
		console.log(dataImage);
		if (dataImage != null) {
			t.deleteImage(dataImage.image);
		};
		jQuery(data.nameImg).attr('src',data.imgEvent);
		jQuery(data.nameImg).attr('style',data.styleOld);
	    jQuery(data.buttonUpload).html('Thay đổi ảnh bìa');
	    jQuery(data.btnDelete).hide();
	    jQuery(data.title).show();
	    jQuery(data.nameDiv).css('height',t.getMinHeight());
	    statusUpimage = 0;
	});
	document.getElementById(data.fileUpload).addEventListener('change', t.fileSelect, false);
	jQuery(data.buttonUpload).click(function () {
		if (statusUpimage == 0) {
			console.log('bat su kien',data.fileUpload);
			document.getElementById(data.fileUpload).click();
		}else{
			if (dataImage != null) {
				topImage = jQuery(data.nameImg).position().top;
				style = 'top:'+topImage +'px;position: relative;';
				jQuery.ajax({
				  url: data.urlSaveImg,
				  type: 'POST',
				  data: {name:dataImage.name,style:style,id:data.idEvent,nameTable:data.nameTable},
				  success: function(da) {
				  	console.log(data);
				    jQuery(data.nameImg).attr('src',da.linkI);
				    jQuery(data.buttonUpload).html('Thay đổi ảnh bìa');
				    jQuery(data.btnDelete).hide();
				    jQuery(data.title).show();
				    statusUpimage = 0;
					t.destroyDrag();	    
					jQuery(data.buttonUpload).css('display','');
				  },
				});
			};
		};
	});
}