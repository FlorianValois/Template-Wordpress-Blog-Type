var $j = jQuery.noConflict();
/* Script Tableau */
$j(function() {
    $j("#tabs").tabs();
    $j('#tabs a').click(function(e) {
        var curTab = $j('.ui-tabs-active');
        curTabIndex = curTab.index();
        document.tabTest.currentTab.value = curTabIndex;
    });
});

/* Script Color Picker */
jQuery(document).ready(function($){
    $j('.bsc_color').wpColorPicker();
    $j('.bsc_bg_color').wpColorPicker();
});
