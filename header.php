<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <!-- Google Font: Contrail One -->
    <link href="https://fonts.googleapis.com/css2?family=Contrail+One&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons (for search icon) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="custom-header">
    <div class="container">
        <div class="row align-items-center w-100">
            <!-- Logo -->
            <div class="col-auto">
                <h1 class="site-logo"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            </div>

            <!-- Search Bar -->
            <div class="col text-center">
                <form role="search" method="get" action="<?php echo home_url('/'); ?>" class="search-form d-flex align-items-center">
                    <div class="input-group">
                        <input type="search" class="form-control border-0 search-input" placeholder="Search for wallpapers..." name="s" aria-label="Search">
                        <button type="submit" class="btn border-0 search-btn" aria-label="Search">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Navigation Menu -->
            <div class="col-auto">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'depth' => 2,
                            'container' => false,
                            'menu_class' => 'navbar-nav',
                            'fallback_cb' => '__return_false',
                            'walker' => new Bootstrap_5_Nav_Walker()
                        ));
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-bottom-line"></div>
</header>

<?php wp_footer(); ?>
</body>
</html>