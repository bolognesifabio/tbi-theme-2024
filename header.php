<html> <?php
    include "views/public/layout/header/head.php"; ?>

    <body>
        <div id="tbi-vue" :class="{ 'scrolled': is_scrolled_from_top }">
            <header class="header"> <?php
                include "views/public/layout/header/top.php";
                include "views/public/layout/header/menu.php";
                include "views/public/layout/header/logo.php";
                include "views/public/layout/header/search.php"; ?>
                <div class="header__flag"></div>
            </header>