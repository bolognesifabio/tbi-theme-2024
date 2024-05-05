<?php get_header(); ?>

<?php
// Get club details
$details = unserialize(get_post_meta(get_the_ID())['tbi-club-details'][0]);
foreach($details as $key => $value) {
    switch($key) {
        case 'city':
            $city = !empty($value) ? $value : '';
            break;
        case 'province':
            $province = !empty($value) ? $value : '';
            break;
        case 'address':
            $address = !empty($value) ? $value : '';
            break;
        case 'phone':
            $phone = !empty($value) ? $value : '';
            break;
        case 'email':
            $email = !empty($value) ? $value : '';
            break;
        case 'website':
            $website = !empty($value) ? $value : '';
            break;
    }
}
?>

<main class="single__clubs">
    <!-- Header -->
    <div class="single__clubs__header">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_html(get_the_title()); ?>" />
                </div>
                <div class="col-10">
                    <h1 class="single__clubs__header__title"><?php echo strtoupper(get_the_title()); ?></h1>
                    <div class="single__clubs__header__contacts">
                        <?php echo '<p>Indirizzo: ' . $address . '</p>'; ?>
                        <?php echo '<p>Città: ' . $city . '</p>'; ?>
                        <?php echo '<p>Provincia: ' . $province . '</p>'; ?>
                        <?php echo '<p>Telefono: ' . $phone . '</p>'; ?>
                        <?php echo '<p>Email: ' . $email . '</p>'; ?>
                        <?php echo '<p>Sito: ' . $website . '</p>'; ?>
                    </div>
                    <div class="single__clubs__header_socials">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="single__clubs__content"><?php the_content(); ?></div>
</main>

<?php get_footer(); ?>