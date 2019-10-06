            <footer class="footer">
                <div class="footer__content"> <?php
                    include "views/public/layout/footer/menu.php"; ?>
                </div>
                <div class="footer__copyright">
                    <img class="footer__copyright__logo" src="<?= get_template_directory_uri() ?>/assets/img/tbi-logo-orizzontale.png" />
                    <p class="footer__copyright__content">&copy; 2019 TBI - Tchoukball Italia</p>
                </div>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
