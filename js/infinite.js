/* Script Tableau */
$(function() {
    $("#tabs").tabs();
    $('#tabs a').click(function(e) {
        var curTab = $('.ui-tabs-active');
        curTabIndex = curTab.index();
        document.tabTest.currentTab.value = curTabIndex;
    });
});

/* Script Color Picker */
jQuery(document).ready(function($){
    $('.bsc_color').wpColorPicker();
    $('.bsc_bg_color').wpColorPicker();
});

/* Script Upload Image */
jQuery(document).ready(function() {
    
jQuery('#upload_image_button_').click(function(){
 formfield = jQuery('#upload_image_').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
}); 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#upload_image_').val(imgurl);
 tb_remove();
}

});
