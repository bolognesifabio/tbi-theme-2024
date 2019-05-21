<?php
global $query_string;
wp_parse_str($query_string, $search_query);
$posts_per_page = 2;

$search_page_query = new WP_Query([
    's' => $search_query['s'],
    'paged' => $search_query['page'],
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page
]);

$total_results = $search_page_query->found_posts;
$total_pages = ceil($total_results / $posts_per_page);

get_header();
?>

<main id="tbi-vue">
    <div class="row--boxed">
        <div class="search__main row--boxed__main"> <?php
            if(!$search_page_query->have_posts()) { ?>
                <h2>Non ci sono risultati per la ricerca effettuata</h2> <?php
            } else { ?>
                <h2>Risultati della ricerca</h2>
                <ul> <?php
                    while($search_page_query->have_posts()) {
                        $search_page_query->the_post();
                        if (get_post_type(get_the_ID()) === 'post') { ?>
                            <li>
                                <h3 class="search-post-title"><?php the_title(); ?></h3>
                                <p class="search-post-excerpt"><?php the_excerpt(); ?></p>
                                <span class="search-post-link"><a href="<?php the_permalink(); ?>">Vai all'articolo</a></span>
                            </li> <?php
                        }
                    } ?>
                </ul> Pagina <?= $search_query['page'] ?: 1 ?> di <?= $total_pages ?><?php
            } ?>
        </div> <?php
        get_sidebar('right'); ?>
    </div>
</main>

<?php get_footer(); ?>


