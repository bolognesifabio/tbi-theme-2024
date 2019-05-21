        <footer class="footer">
            <div class="footer__content row--boxed"> <?php
                include "views/footer/menu.php"; ?>
            </div>
            <div class="footer__copyright">
                <img class="footer__copyright__logo" src="<?= get_template_directory_uri() ?>/contents/img/tbi-logo.png" />
                <p class="footer__copyright__text">&copy; 2019 TBI - Tchoukball Italia</p>
            </div>
        </footer>
        <?php wp_footer(); ?>
        <script src="<?= home_url( '/' ); ?>wp-content/themes/tbi-theme/contents/js/main.js"></script>
    </body>
</html>
