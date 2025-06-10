<header class="header header--transparent">
    <div class="header__wrap">
        <div class="header__content">
            <!-- main logo -->
            <?php get_template_part('components/header/logo'); ?>

            <!-- Main Menu -->
            <?php
            if ( !wp_is_mobile() ) :
                get_template_part('components/header/nav');
            endif;
            ?>

            <div class="header__grow"></div>

            <div class="header__right">
                <?php
                $contact_page = everygolf_get_page_link_info_by_template_file( 'page-templates/page-contact.php' );

                if ( $contact_page ) :
                ?>
                    <a href="<?php echo esc_url( $contact_page['url'] ) ?>" class="header__contact">
                        <?php echo esc_html( $contact_page['title'] ); ?>
                    </a>
                <?php endif; ?>

                <!-- language selection -->
                <?php get_template_part('components/header/lang', 'switcher'); ?>

                <div class="header__humberger d-xl-none">
                    <span class="t-1"></span>
                    <span class="t-2"></span>
                    <span class="t-3"></span>
                </div>
            </div>

            <div class="header__line">
                <svg width="100%" viewBox="0 0 1777 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 68.5H1695.25C1703.73 68.5 1711.87 65.1286 1717.87 59.1274L1776 1" stroke="white" stroke-opacity="0.2" stroke-width="2"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="header__fixHeight"></div>
</header>

<!-- Mobile Menu -->
<?php
if ( wp_is_mobile() ) :
    get_template_part('components/header/nav', 'mobile');
endif;
?>