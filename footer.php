    <footer>
        <p>© 2025 - Tiwura useggas </p>

        <?php
            wp_nav_menu(array(
                    'theme-location' => 'lower-menu',
                    'menu_id' => 'lower-menu-id',
                    'menu_class' => 'lower-menu-class'
            ));
        ?>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>