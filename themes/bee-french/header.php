<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <a class="arrow-up top1" href="#top">
        <span class="left-arm"></span>
        <span class="right-arm"></span>
        <span class="arrow-slide"></span>
    </a>
    <div class="marges" data-scroll-container>
        <header>
            <a class="logo" href="<?= get_home_url() ?>">BeeFrench</a>
            <?php wp_nav_menu([
                'menu' => 'Menu 1',
                'theme_location' => 'header',
                'container' => "nav",
            ]);
            ?>
            <a href="<?= get_home_url() ?>/panier" class="baskethead"><i class="bi bi-cart2"></i></a>
            <div class="menu_toggle" id="toggle">
                <span class="arm1"></span>
                <span class="arm2"></span>
                <span class="arm3"></span>
            </div>
        </header>
        <div class="underlay_header2"></div>
        <section class="header2">
            <nav class="nav2">
                <a class="logo2" href="<?= get_home_url() ?>">BeeFrench</a>
                <?php wp_nav_menu([
                    'menu' => 'Menu 1',
                    'theme_location' => 'header',
                    'container' => 'nav',
                ]);
                ?>
        </section>