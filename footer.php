<footer id="footer">
   
    <div id="footer_widgets">
        <div class="inner-wrap">
            <div id="sidebar_footer">
                <?php dynamic_sidebar('Footer'); ?>
            </div>
        </div>
    </div>
    
    <div id="footer_infos">
        <div class="inner-wrap">
            <p>© 2009-2015 <?php bloginfo('name'); ?></p>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
<?= get_option('infinite-google-analytics', '')?>
</body>
</html>