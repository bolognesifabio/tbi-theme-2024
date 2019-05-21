        <footer class="footer">
            <div class="footer__content row--boxed"> <?php
                include "views/layout/footer/menu.php"; ?>
            </div>
            <div class="footer__copyright">
                <img class="footer__copyright__logo" src="<?= get_template_directory_uri() ?>/assets/img/tbi-logo.png" />
                <p class="footer__copyright__text">&copy; 2019 TBI - Tchoukball Italia</p>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
