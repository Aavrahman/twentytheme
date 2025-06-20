    <footer>
        <div class="container">
            <p>© 2025 - Tiwura useggas </p>

            <?php
                wp_nav_menu(array(
                        'theme_location' => 'bottom-menu',
                        'menu_id' => 'bottom-menu-id',
                        'menu_class' => 'bottom-menu-class'
                ));
            ?>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>