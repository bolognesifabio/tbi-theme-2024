<div class="header__contents__row__clubs"> <?php
    for($i = 1; $i < 16; $i++) { ?>
        <img src="<?= get_template_directory_uri() ?>/assets/img/club/<?= $i < 10 ? '0' . $i : $i ?>.jpg" /> <?php
    } ?>
</div>