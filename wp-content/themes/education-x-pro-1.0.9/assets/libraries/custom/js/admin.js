(function ($) {

    $('.tmt-img-upload-button').click( function(){
        event.preventDefault();
        var imgContainer = $(this).closest('.tmt-img-fields-wrap').find( '.tmt-thumbnail-image .tmt-img-container'),
        removeimg = $(this).closest('.tmt-img-fields-wrap').find( '.tmt-img-delete-button'),
        imgIdInput = $(this).siblings('.upload-id');
        var frame;
        // Create a new media frame
        frame = wp.media({
            title: education_x_data.upload_image,
            button: {
            text: education_x_data.use_imahe
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });
        // When an image is selected in the media frame...
        frame.on( 'select', function() {
            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();
            // Send the attachment URL to our custom image input field.
            imgContainer.html( '<img src="'+attachment.url+'" />' );
            removeimg.addClass('tmt-img-show');
            // Send the attachment id to our hidden input
            imgIdInput.val( attachment.url ).trigger('change');
        });
        // Finally, open the modal on click
        frame.open();
    });

    // DELETE IMAGE LINK
    $('.tmt-img-delete-button').click( function(){
        event.preventDefault();
        var imgContainer = $(this).closest('.tmt-img-fields-wrap').find( '.tmt-thumbnail-image .tmt-img-container');
        var removeimg = $(this).closest('.tmt-img-fields-wrap').find( '.tmt-img-delete-button');
        var imgIdInput = $(this).closest('.tmt-img-fields-wrap').find( '.upload-id');
        // Clear out the preview image
        imgContainer.find('img').remove();
        removeimg.removeClass('tmt-img-show');
        // Delete the image id from the hidden input
        imgIdInput.val( '' ).trigger('change');
    });

    // Metabox Tab
    $('.tmt-metabox-tab a').click(function (){
        var tabid = $(this).attr('id');
        $('.tmt-metabox-tab a').removeClass('tmt-tab-active');
        $(this).addClass('tmt-tab-active');
        $('.tmt-tab-content .tmt-content-wrap').hide();
        $('.tmt-tab-content #'+tabid+'-content').show();
        $('.tmt-tab-content .tmt-content-wrap').removeClass('tmt-tab-content-active');
        $('.tmt-tab-content #'+tabid+'-content').addClass('tmt-tab-content-active');
    });

}(jQuery));