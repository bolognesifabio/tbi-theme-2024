<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php bloginfo('name'); ?></title>
    
    <link rel="shortcut icon" href="<?= home_url( '/' ); ?>wp-content/themes/tbi-theme/favicon.ico" >
    <script src="//www.youtube.com/iframe_api"></script>
    
    <?php wp_head(); ?>
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
</head>