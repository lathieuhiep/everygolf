    <?php
    if ( !is_404() ) :
        $copyright_default = esc_html__( 'Copyright @ 2025 Everygolf', 'everygolf' );
        $copyright = everygolf_get_option('opt_footer_copyright_content', $copyright_default);
    ?>
        <footer class="footer">
            <div class="item-wrap">
                <div class="item-bg">
                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/footer-bg-pc.webp')) ?>"
                         alt="<?php echo esc_attr(get_bloginfo('title')); ?>" width="1920" height="400">
                </div>

                <a href="#" class="item-backtotop d-none"><i class="icon-arrow-up"></i></a>

                <div class="item-footer">
                    <div class="container">
                        <ul>
                            <li>
                                <?php
                                $copyright_text = __( $copyright, 'everygolf' );
                                echo esc_html( $copyright_text );
                                ?>
                            </li>

                            <?php
                            if ( has_nav_menu('footer_menu') ) :
                                wp_nav_menu([
                                    'theme_location' => 'footer_menu',
                                    'container'      => false,
                                    'items_wrap'     => '%3$s',
                                ]);
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    <?php endif; ?>
</div> <!-- close div class page-wrapper  -->

<?php wp_footer(); ?>
</body>
</html>