jQuery(document).ready(function(){
	/* When click on add Slider Image */	
	jQuery('#slider_image_add').on('click', function(e){
        jQuery('#add_slider_image').modal({show:true});        
    });
    jQuery('#slider_images').on('change', function(){
    	jQuery('#preview-slider-img').html('');
    	jQuery('#preview-slider-img').html('Upload...');
    	jQuery('#cropimage').ajaxForm({
    		target: '#preview-slider-img',
    		success: function(){
    			jQuery('img#photo').imgAreaSelect({
                  aspectRatio: '1:1',
				onSelectEnd: getSizes,
    			});
    			jQuery('#image_name').val(jQuery('#photo').attr('file-name'));
    		}
    	}).submit();
    });
   /* handle functionality when click on button ... */
   jQuery('#save_crop').on('click', function(e){
   e.preventDefault();
   params = {
   	targetUrl: 'crop_img.php?action=seve',
   	action: 'seve',
   	x_axis: jQuery('#hdn-x1-axis').val(),
   	y_axis: jQuery('#hdn-y1-axis').val(),
   	x2_axis: jQuery('#hdn-x2-axis').val(),
   	y2_axis: jQuery('#hdn-y2-axis').val(),
   	thumb_width: jQuery('#hdn-thumb-width').val(),
   	thumb_height: jQuery('#hdn-thumb-height').val()
   };
   saveCropImage(params);
   })
   /* Function to get image size */
   function getSizes(img, obj){
   	var x_axis  = obj.x1;
   	var x2_axis = obj.x2;
   	var y_axis  = obj.y1;
   	var y2_axis = obj.y2;
   	var thumb_width  = obj.width;
   	var thumb_height = obj.height;
   	if (thumb_width > 0) {
   		jQuery('#hdn-x1-axis').val(x_axis);
   		jQuery('#hdn-y1-axis').val(y_axis);
   		jQuery('#hdn-x2-axis').val(x2_axis);
   		jQuery('#hdn-y2-axis').val(y2_axis);
   		jQuery('#hdn-thumb-width').val(thumb_width);
   		jQuery('#hdn-thumb-height').val(thumb_height);
   	}else{
   		alert("Please select portion..!");
   	}
   }
   /* Function to seve Crop Image */
   function saveCropImage(params){
       jQuery.ajax({
       	url: params['targetUrl'],
       	cache: false,
       	dataType: "html",
       	data: {
          action: params['action'],
          id: jQuery('#hdn-slider-id').val(),
          t: 'ajax',
          w1:params['thumb_width'],
          h1:params['thumb_height'],
          x1:params['x_axis'],
          y1:params['y_axis'],
          x2:params['x2_axis'],
          y2:params['y2_axis'],
          image_name :jQuery('#image_name').val()
       	},
       	type: 'Post',
       	success: function(response){
           jQuery('#add_slider_image').modal('hide');
           jQuery(".imgareaselect-border1,.imgareaselect-border2,.imgareaselect-border3,.imgareaselect-border4,.imgareaselect-border2,.imgareaselect-outer").css('display', 'none');

           jQuery('#slider_image').attr('src', response);
           jQuery('#preview-slider-img').html('');
           jQuery('#slider_images').val();
       	},
       	error: function(xhr, ajaxOptions, thrownError){
          alert('status Code:' + xhr.status + 'Error Message' + thrownError);
       	}

       })
   }
});