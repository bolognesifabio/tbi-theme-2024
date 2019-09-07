<?php
use TBI\Controllers\Pages\Home as Home_Controller;

$view_model = Home_Controller::slider(); ?>

<tbi-home-slider view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <section class="slider">
        <transition-group name="slider__posts__item" tag="ul" class="slider__posts">
            <li v-for="post in model" v-show="post.is_active" :key="post.id" class="slider__posts__item">
                <img class="slider__posts__item__img" :src="post.img" />
                <h2 class="slider__posts__item__title">{{ post.title }}</h2>
                <button class="slider__posts__item__cta">Leggi articolo</button>
            </li>
        </transition-group>

        <ul class="slider__nav">
        </ul>
    </section>
</tbi-home-slider>