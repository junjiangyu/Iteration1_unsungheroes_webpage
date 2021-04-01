/**
 * Scripts within the customizer controls window.
 *
 */

jQuery( document ).ready(function($) {

     $('.widget .wordnews-pro-icon-picker').each( function() {
        $(this).iconpicker( '#' + this.id );
    } );
     
    $(document).on('widget-updated widget-added', function(){
    // icon picker
        $('.widget .wordnews-pro-icon-picker').each( function() {
            $(this).iconpicker( '#' + this.id );
        } );
    });
      
});
