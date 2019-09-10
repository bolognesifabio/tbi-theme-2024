<?php
if (is_active_sidebar('home_sidebar')) { ?>
    <aside class="row--boxed__sidebar"> <?php
        dynamic_sidebar('home_sidebar'); ?>
    </aside> <?php
}
