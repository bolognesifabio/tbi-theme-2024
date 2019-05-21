<?php
include "_get-data.php"; ?>

<div class="page-competition row--boxed">
    <h1 class="page-competition__title"><?= $competition_term->name ?: "" ?></h1> <?php
    if ($competition_term->description) { ?>
        <h2 class="page-competition__subtitle"><?= $competition_term->description ?></h2> <?php
    } ?>

    <tbi-vue-page-competition data-slides='<?= json_encode($competitions) ?>'></tbi-vue-page-competition>
</div>