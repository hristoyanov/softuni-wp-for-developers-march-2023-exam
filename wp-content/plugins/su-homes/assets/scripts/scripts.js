jQuery(document).ready(function($) {
    $('.like-button').on('click', function(e){
        e.preventDefault();
        let id = jQuery(this).attr('id')

        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action: 'su_home_like_item',
                home_id: id
            },
            success: function(msg){
                console.log(msg);
            }
        });
    });
});
