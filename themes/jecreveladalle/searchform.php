<form role="search" action="<?php echo home_url('/'); ?>" method="get" class="navbar-form navbar-left">
    <div class="form-group search-bar">
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        <input type="search" class="form-control" name="s" value="<?php get_search_query(); ?>" placeholder="<?php get_search_query(); ?>">
    </div>
</form>