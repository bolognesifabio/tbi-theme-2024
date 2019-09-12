<?php
if (is_active_sidebar('home_sidebar')) { ?>
    <aside class="home__sidebar"> <?php
        dynamic_sidebar('home_sidebar'); ?>
    </aside> <?php
}
