<?php
use TBI\Controllers\Layout\Header as Header_Controller;

$clubs = Header_Controller::clubs(); ?>

<section class="header__clubs">
    <ul class="header__clubs__list"> <?php
        foreach ($clubs as $club) { ?>
            <li class="header__clubs__list__item">
                <a class="header__clubs__list__item__link" href="<?= $club->url ?>">
                    <img class="header__clubs__list__item__link__emblem" src="<?= $club->emblem ?>" />
                </a>
            </li> <?php
        } ?>
    </ul>
</section>