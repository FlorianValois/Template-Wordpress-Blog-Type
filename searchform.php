<form method="get" id="form" class="searchform" action="<?php bloginfo('url'); ?>/">
  <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Tapez un mot-clé">
  <input type="submit" id="submit" value="Rechercher">
</form>