function openMediaUploader() {

// The lines below refresh the page after the media uploader pop-up is closed.

    if ((window.original_tb_remove == undefined) && (window.tb_remove != undefined)) {
       window.original_tb_remove = window.tb_remove;
       window.tb_remove = function () {
           window.original_tb_remove();
           var href = window.location.href;
           var index = href.indexOf("?");
           if (index >= 0) {
               window.location.replace(href.substr(0, index) + "?page=simple_slideshow");
           }
       };
    }

// The line below displays the media uploader pop-up.

    tb_show('', 'media-upload.php?type=image&post_id=1&TB_iframe=true&flash=0&simple_slideshow=true');

/* The following lines append the value ‘&simple_slideshow=true’ to all the links in the media uploader pop-up. Based on this parameter, we can determine if the request came from the pop-up of our media uploader. */

   jQuery('iframe#TB_iframeContent').load(function () {

       jQuery(this).contents().find('#sidemenu li').each(function (i) {
           var tab_link = jQuery(this).children(":first-child");
           var href = tab_link.attr('href');
           if (href.indexOf('simple_slideshow') < 0) {
               tab_link.attr('href', href + '&simple_slideshow=true');
           }
       });

    });
    return false;
}