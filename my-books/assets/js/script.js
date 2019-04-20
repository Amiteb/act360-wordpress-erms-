

(function($) {
	
	$(document).ready(function() {
		$('#btn-upload').on("click",function(){
			var image= wp.media({
				title:"Upload image for My book",
				multiple:false
			}).open().on("select",function(){
				var upload_image=image.state().get("selection").first();
			var getImage=upload_image.toJSON().url;
			$('#show-image').html("<image src='"+getImage+"' style='height:50px; width:50px'>");
			$('#image_name').val(getImage);
			});
		});
	// ==============================================================
    $('#example').DataTable();
    $('#frmAddBook').validate({
    	submitHandler:function(){
    		var postdata= "action=mybooklibrary&param=save_book&" + jQuery('#frmAddBook').serialize();
			jQuery.post(mybookajaxurl,postdata, function(response){
				var data=jQuery.parseJSON(response);
				if(data.status==1){
					jQuery.notifyBar({
						cssClass:"success",
						html:data.message
					});
				}
				else{

				}
			});
    		
    	}
    });
// ===========================================================
    $('#frmEditBook').validate({
    	submitHandler:function(){
    		var postdata= "action=mybooklibrary&param=edit_book&" + jQuery('#frmEditBook').serialize();
			jQuery.post(mybookajaxurl,postdata, function(response){
				var data=jQuery.parseJSON(response);
				if(data.status==1){
					jQuery.notifyBar({
						cssClass:"success",
						html:data.message
					});
					setTimeout(function(){
						// window.location.reload();
						location.reload();
					},1300);

				}
				else{

				}
			});
    		
    	}
    });
    // =======================================================
    $('.btnbookdelete').on('click',function(){
    var conf=confirm("Are you sure to delete ?");
    if(conf){
    		var book_id=$(this).attr('data-id');
    	var postdata= "action=mybooklibrary&param=delete_book&id=" + book_id;
			jQuery.post(mybookajaxurl,postdata, function(response){
				var data=jQuery.parseJSON(response);
				if(data.status==1){
					jQuery.notifyBar({
						cssClass:"success",
						html:data.message
					});
					setTimeout(function(){
						// window.location.reload();
						location.reload();
					},1300);

				}
				else{

				}
			});
    }

    });
    // ===============================================
    $('#frmAddAuthor').validate({
    	submitHandler:function(){
    		var postdata= "action=mybooklibrary&param=save_author&" + jQuery('#frmAddAuthor').serialize();
			jQuery.post(mybookajaxurl,postdata, function(response){
				var data=jQuery.parseJSON(response);
				if(data.status==1){
					jQuery.notifyBar({
						cssClass:"success",
						html:data.message
					});
				}
				else{

				}
			});
    	}
    });

} );
	
})( jQuery );