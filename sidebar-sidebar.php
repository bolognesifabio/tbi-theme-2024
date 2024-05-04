<?php
if (is_active_sidebar('sidebar')) { ?>
    <aside class="sidebar"> <?php
        dynamic_sidebar('sidebar');
        
        if ((is_home())) { ?>
            <a href="http://www.wesport.eu/" target="_blank" class="row--boxed__sidebar__wesport-banner">
                <img src="<?= get_template_directory_uri() ?>/assets/img/wesport-logo.png" />
            </a> <?php
        } ?>
    </aside> <?php
}
