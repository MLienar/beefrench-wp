<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
            <nav>
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                ]);
                ?>
                <!-- <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bag" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg>
                        </a> -->
                <div class="toggle_menu">
                    <div class="arm_menu_1"></div>
                    <div class="arm_menu_2"></div>
                    <div class="arm_menu_3"></div>
                </div>
            </nav>
        </header>
        <div class="dark_overlay_header"></div>
        <section class="header2">
            <nav>
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                ]);
                ?>
                <!-- <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                class="bi bi-bag" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg>
                        </a> -->
        </section>