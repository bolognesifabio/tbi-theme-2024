<?php
$clubs = get_posts([ 
    'post_type' => 'clubs',
    'posts_per_page' => -1,
    'orderby' => 'post_title',
    'order' => 'DESC'
]);  ?>

<section class="header__clubs">
    <ul> <?php
        foreach ($clubs as $club) { ?>
            <img src="<?= get_the_post_thumbnail_url($club->ID, 'team-emblem') ?>" /> <?php

        } ?>
    </ul>
</section>