<?php
if (is_active_sidebar('sidebar_left')) { ?>
    <aside class="row--boxed__sidebar"> <?php
        dynamic_sidebar('sidebar_left'); ?>
    </aside> <?php
}
