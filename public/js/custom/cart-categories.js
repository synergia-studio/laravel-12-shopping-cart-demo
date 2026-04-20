
jQuery(document).ready(function() {

    jQuery(document).on('click', '.more_description', function() {
        $id = jQuery(this).attr("id");
        jQuery(".short_description_" + $id).hide(500);
        jQuery(".full_description_" + $id).show(500);
    });

   jQuery(document).on('click', '.less_description', function() {
        $id = jQuery(this).attr("id");
        jQuery(".short_description_" + $id).show(500);
        jQuery(".full_description_" + $id).hide(500);
    });

});
