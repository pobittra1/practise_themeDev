<?php
// this template for displaying header

?>


<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href=""><img src="<?php echo get_theme_mod('pobi_logo') ?>" alt=""></a>
                </div>
                <div class=" col-md-9">
                    <div class="nav-container">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main_menu',
                            'menu_id' => 'nav',
                            'container' => false,
                            'menu_class' => 'nav',
                            'walker' => new Custom_Nav_Walker()
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>

</html>