<?php
header("Content-type: text/css; charset=UTF-8");
?>

#header{
    border-color: <?= get_option('infinite-bartop', '')?>!important;
}

#navigation,
#navigation ul.primary-menu li.sous-menu:hover ul li{
    background-color: <?= get_option('infinite-barnavcol1', '')?>!important;
}

#navigation,
#navigation ul.primary-menu li a{
    border-color: <?= get_option('infinite-barnavcol2', '')?>!important;
}

#navigation ul.primary-menu li a:hover,
#navigation ul.primary-menu li.current-menu-item a{
    background-color: <?= get_option('infinite-barnavcol2', '')?>!important;
}

#navigation a{
    color: <?= get_option('infinite-barnavcol3', '')?>!important;
}