<html lang="<?php language_attributes();?>" class="no-js">
<head>
    <meta charset="<?php bloginfo('cherset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php echo get_site_url();//output: website url?>
