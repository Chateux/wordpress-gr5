<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); echo ' - '; bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php bloginfo('url'); ?>" class="navbar-brand"><?php bloginfo('name'); ?></a>
        </div>

        <div class="collapse navbar-collapse">
            <form class="navbar-form navbar-left">
                <div class="form-group search-bar">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <input type="search" class="form-control" placeholder="Search">
                </div>
            </form>

            <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'menu_class' => 'nav navbar-nav navbar-right' ) ); ?>

        </div>
    </div>
</nav>

<?php

$loop = new WP_Query( array( 'post_type' => 'Evenement', 'posts_per_page' => 4 ) );

?>
<div class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        $first = true;
        while ( $loop->have_posts() ) : $loop->the_post();
        ?>

        <?php if($first) { ?>
        <div class="item active">
            <?php $first = false; } else { ?>
            <div class="item">
                <?php } ?>

                <?php the_post_thumbnail(); ?>
                <div class="carousel-caption">
                    <?php the_title(); ?>
                </div>
            </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>