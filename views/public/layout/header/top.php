<?php
use TBI\Controllers\Layout\Header as Header_Controller;

$clubs = Header_Controller::clubs(); ?>

<section class="header__top">
    <ul class="header__top__clubs"> <?php
        foreach ($clubs as $club) { ?>
            <li class="header__top__clubs__item">
                <a class="header__top__clubs__item__link" href="<?= $club->url ?>">
                    <img class="header__top__clubs__item__link__emblem" src="<?= $club->emblem ?>" />
                </a>
            </li> <?php
        } ?>
    </ul>

    <ul class="header__top__social">
        <li class="header__top__social__item">
            <a href="https://www.instagram.com/tchoukballitalia/">
                <tbi-icon :icon="['fab', 'instagram']" class="header__top__social__item__icon" />
            </a>
        </li>
        <li class="header__top__social__item">
            <a href="https://www.flickr.com/people/tchoukballitalia/">
                <tbi-icon :icon="['fab', 'flickr']" class="header__top__social__item__icon" />
            </a>
        </li>
        <li class="header__top__social__item">
            <a href="https://www.facebook.com/tchoukballitalia">
                <tbi-icon :icon="['fab', 'facebook-square']" class="header__top__social__item__icon" />
            </a>
        </li>
        <li class="header__top__social__item header__top__social__item--youtube">
            <a href="https://www.youtube.com/user/youtchouk">
                <tbi-icon :icon="['fab', 'youtube']" class="header__top__social__item__icon" /></tbi-icon>
                YouTchouk
            </a>
        </li>
    </ul>
</section>