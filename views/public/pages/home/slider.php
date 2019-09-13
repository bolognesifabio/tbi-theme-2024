<?php
use TBI\Controllers\Pages\Home as Home_Controller;

$view_model = Home_Controller::slider(); ?>

<tbi-home-slider view_model="<?= htmlentities(json_encode($view_model)) ?>" inline-template>
    <section class="slider" @mouseenter="stop_autoplay" @mouseleave="resume_autoplay">
        <transition-group name="slider__posts__item" tag="ul" class="slider__posts">
            <li v-for="post in model" v-show="post.is_active" :key="post.id" class="slider__posts__item">
                <img v-if="post.img" class="slider__posts__item__img" :src="post.img" />
                <h2 class="slider__posts__item__title">{{ post.title }}</h2>
                <a :href="post.url" class="slider__posts__item__cta">Leggi articolo</a>
            </li>
        </transition-group>

        <ul class="slider__nav">
            <li
                v-for="post in model"
                :key="post.id"
                :class="{ 'slider__nav__item': true, 'slider__nav__item--active': post.is_active }"
            >
                <button class="slider__nav__item__cta" @click.prevent="go_to_slide(post.id)"></button>
            </li>
        </ul>
    </section>
</tbi-home-slider>