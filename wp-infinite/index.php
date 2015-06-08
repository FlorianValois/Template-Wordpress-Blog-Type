<?php

add_action('admin_menu', 'wp_infinite_panel');


function wp_infinite_panel(){
    add_menu_page ('WP-Infinite', 'WP-Infinite', 'manage_options', 'panel', 'settings', get_template_directory_uri().'/wp-infinite/img/logo.png', 1000);
    add_submenu_page('panel', 'Settings', 'Settings', 'manage_options', 'panel', 'settings');
    add_submenu_page('panel', 'Documentation', 'Documentation', 'manage_options', 'documentation', 'documentation');
    
    wp_enqueue_style( 'infinite-css', get_template_directory_uri() . '/wp-infinite/css/wp-infinite.css');
    wp_enqueue_style( 'thickbox' ); // Stylesheet used by Thickbox
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'wp-infinite-upload', get_template_directory_uri() . '/wp-infinite/js/wp-infinite-upload.js', array( 'thickbox', 'media-upload' ) );
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script( 'wp-infinite-js', get_template_directory_uri() . '/wp-infinite/js/wp-infinite.js');
    
    wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'fontawesome'); 
}


function settings(){
    if(isset($_POST['pannel_update'])){
        foreach($_POST['options'] as $name => $value){
            if(empty($value)){
                delete_option($name);
            }else{
                update_option($name, $value);
            }
        }
        ?>
        <div id="message" class="updated fade">
            <p>Options sauvegardées avec succès !</p>
        </div>
        <?php
    }


    ?>

   
<div id="infinite-panel">
   
<div id="tabs">
<div id="infinite-menu">
<div id="logo"></div>
    <ul>
        <li><a href="#tabs-1"><span class="fa fa-cog"></span>General Setting</a></li>
        <li><a href="#tabs-2">Header Settings</a></li>
        <li><a href="#tabs-3">Archives Settings</a></li>
    </ul>
</div>
    
<div id ="infinite-tab" class="theme-options-group">  
<form action="" method="post">
    
<div id="tabs-1" class="tabs-wrap">
<h2>General Setting</h2>

<p class="submit">
    <input type="submit" name="pannel_update" class="button-primary" value="Enregistrer les modifications" />
</p>

<div class="infinite-item">
    <h3>Favicon</h3>
    <div class="infinite-sub-item">
        
        <span class="label">Custom Favicon</span>
        <input type="text" name="options[infinite-favicon]" value="<?= get_option('infinite-favicon', '')?>" />
        
        <img src="<?php echo get_option('infinite-favicon', get_option('home').'/wp-content/themes/leblogdeflo/img/spacer.jpg" style="border:0;');?>" class="prev_img"/>
    </div>
</div>

<div class="infinite-item">
    <h3>Header Code</h3>
    <div class="infinite-sub-item">
        <small>Le code suivant va être ajouté à la balise &lt;head&gt;.</br>
        Utile si vous avez besoin d'ajouter des scripts supplémentaires tels que CSS ou JS.</small>
        <textarea id="options" name="options[infinite-headercode]" cols="60" rows="7"><?= stripslashes(get_option('infinite-headercode', ''));?></textarea>
    </div>
</div>

<div class="infinite-item">
    <h3>Footer Code</h3>
    <div class="infinite-sub-item">
        <small>Le code suivant va être ajouté au pied de page avant la balise &lt;/body&gt;.</br>
        Utile si vous avez besoin de Javascript ou de code de suivi <em>(Ex : Google Analytics)</em>.</small>
        <textarea id="options" name="options[infinite-footercode]" cols="60" rows="7"><?= stripslashes(get_option('infinite-footercode', ''));?></textarea>
    </div>
</div>

<p class="submit">
    <input type="submit" name="pannel_update" class="button-primary" value="Enregistrer les modifications" />
</p>
</div>


<div id="tabs-2" class="tabs-wrap">
<h2>Header Settings</h2>

<p class="submit">
    <input type="submit" name="pannel_update" class="button-primary" value="Enregistrer les modifications" />
</p>

<div class="infinite-item">
    <h3>Barre de navigation (Top)</h3>
    <div class="infinite-sub-item">
        <span class="label">Couleur barre top</span>
        <input type="text" class="bsc_color" name="options[infinite-bartop]" value="<?= get_option('infinite-bartop', '')?>" />
    </div>
</div> 

<div class="infinite-item">
    <h3>Logo</h3>
    <div class="infinite-sub-item">
        
        <span class='upload'>
       <span class="label">Logo Image</span>
        <input type="text" class="regular-text text-upload" name="options[infinite-logo]" value='<?= get_option('infinite-logo'); ?>'/>
        <input type="button" class="small_button button-upload" value="Upload image"/></br>
        <img style="max-width: 300px; display: block;" src='<?= get_option('infinite-logo', get_option('home').'/wp-content/themes/leblogdeflo/img/logo.jpg'); ?>' class="preview-upload prev_img" />
    </span>
        <p class="indication-text">Taille recommandée (MAX) : 500px X 100px</p>
    </div>
</div>

<div class="infinite-item">
    <h3>Logo 2</h3>
    <div class="infinite-sub-item">

    <span class='upload'>
       <span class="label">Logo Image</span>
        <input type="text" class="regular-text text-upload" name="options[infinite-logo2]" value='<?= get_option('infinite-logo2'); ?>'/>
        <input type="button" class="small_button button-upload" value="Upload image"/></br>
        <img style="max-width: 300px; display: block;" src='<?= get_option('infinite-logo2', get_option('home').'/wp-content/themes/leblogdeflo/img/logo.jpg'); ?>' class="preview-upload prev_img" />
    </span>
        <p class="indication-text">Taille recommandée (MAX) : 500px X 100px</p>
    </div>
</div>



<div class="infinite-item">
    <h3>Barre de navigation (Top)</h3>
    <div class="infinite-sub-item">
        <span class="label">Première Couleur</span>
        <input type="text" class="bsc_color" name="options[infinite-barnavcol1]" value="<?= get_option('infinite-barnavcol1', '')?>" />
    </div>
    <div class="infinite-sub-item">
        <span class="label">Seconde Couleur</span>
        <input type="text" class="bsc_color" name="options[infinite-barnavcol2]" value="<?= get_option('infinite-barnavcol2', '')?>" />
    </div>
    <div class="infinite-sub-item">
        <span class="label">Couleur Liens</span>
        <input type="text" class="bsc_color" name="options[infinite-barnavcol3]" value="<?= get_option('infinite-barnavcol3', '')?>" />
    </div>
</div> 

<p class="submit">
    <input type="submit" name="pannel_update" class="button-primary" value="Enregistrer les modifications" />
</p>
</div>

<div id="tabs-3" class="tabs-wrap">
<h2>Archives Setting</h2>
<p class="submit">
    <input type="submit" name="pannel_update" class="button-primary" value="Enregistrer les modifications" />
</p>

<div id="style-blog" class="infinite-item">
<h3>Style Aperçu Articles</h3>
<div class="infinite-sub-item">
    <label class="align"><img src="<?= get_option('home').'/wp-content/themes/leblogdeflo/img/style-1.jpg'; ?>" /><br/>
    <input type="radio" name="options[infinite-style-blog]" value="loop-1" <?php if(get_option('infinite-style-blog', '')=='loop-1'){echo'checked="checked" class="style-blog-active"';}?>></label>

    <label class="align"><img src="<?= get_option('home').'/wp-content/themes/leblogdeflo/img/style-2.jpg'; ?>" /><br/>
    <input type="radio" name="options[infinite-style-blog]" value="loop-2" <?php if(get_option('infinite-style-blog', '')=='loop-2'){echo'checked="checked" class="style-blog-active"';}?>></label>
    
    <label class="align"><img src="<?= get_option('home').'/wp-content/themes/leblogdeflo/img/style-3.jpg'; ?>" /><br/>
    <input type="radio" name="options[infinite-style-blog]" value="loop-3" <?php if(get_option('infinite-style-blog', '')=='loop-3'){echo'checked="checked" class="style-blog-active"';}?>></label>
    
</div>
</div>

<p class="submit">
    <input type="submit" name="pannel_update" class="button-primary" value="Enregistrer les modifications" />
</p>
</div>
    
</div><!-- Fin Infinite tabs -->
</form><!-- Fin Formulaire -->  
</div><!-- Fin tabs -->

<div class="clear"></div>

</div><!-- Fin Infinite Panel -->
    
    <?php
}