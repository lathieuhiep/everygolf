<div class="menuMobile d-xl-none">
    <div class="menuMobile__inner">
        <?php
        if ( has_nav_menu( 'main_mobile_menu' ) ) :
            wp_nav_menu( array(
                'theme_location' => 'main_mobile_menu',
                'container_class'=> 'menuMobile__nav',
                'menu_class'     => 'menu-list',
            ) );
        else:
        ?>
            <div class="menuMobile__nav">
                <ul class="menu-list">
                    <li class="menu-item active">
                        <a href="<?php echo esc_url( get_admin_url() . '/nav-menus.php' ); ?>">
                            <?php esc_html_e( 'Thêm Menu', 'everygolf' ); ?>
                        </a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>