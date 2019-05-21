<?php
if (is_active_sidebar('sidebar_right')) { ?>
    <aside class="row--boxed__sidebar"> <?php
        dynamic_sidebar('sidebar_right');
        
        if (is_home) { ?>
            <a href="http://www.wesport.eu/" target="_blank" class="row--boxed__sidebar__wesport-banner">
                <img src="<?= get_template_directory_uri() ?>/contents/img/wesport-logo.png" />
            </a> <?php
        } ?>
    </aside> <?php
}
