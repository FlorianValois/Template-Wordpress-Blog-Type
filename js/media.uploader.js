jQuery(document).ready(function () {

   jQuery('#sss_upload_image_button').click(function () {
       return openMediaUploader();
    });

    window.send_to_editor = function (html) {
       tb_remove();
    };

});