jQuery(document).ready(function() {
    jQuery('#btn_add_new_repeater_item').click(function() {
        var current_id = jQuery('.item_ID').val();
        jQuery.ajax({
            type: 'post',
            data: {
                'action': 'mm_script_add_new_repeater_item',
				'current_id':current_id
            },
            url: mmAjax.ajaxurl,
            success: function (msg) {
                jQuery('#wrap-repeater-item').append(msg);
				var id = parseInt(current_id)+1;
				jQuery('.item_ID').val(id);
            }
        });
    });
	
	jQuery(".item-load").click(function(){
		if(jQuery(this).val() == "all"){
			jQuery(this).parents( '.repeater-item' ).find( '.cpt' ).removeClass( 'hidden' );
			jQuery(this).parents( '.repeater-item' ).find( '.ip_tab' ).addClass( 'hidden' );
		}
		else{
			jQuery(this).parents( '.repeater-item' ).find( '.cpt' ).addClass( 'hidden' );
			jQuery(this).parents( '.repeater-item' ).find( '.ip_tab' ).removeClass( 'hidden' );	
		}
	});
});