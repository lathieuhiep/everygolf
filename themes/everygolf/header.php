<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if ( !is_404() ) : ?>
    <header>
        <nav>
            <?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
        </nav>
    </header>
<?php endif; ?>