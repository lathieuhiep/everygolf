<?php
$img_pc = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_ABOUT_US_HERO . 'img_pc_id', true);
$title_pc = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_ABOUT_US_HERO . 'title_pc', true);
$text_list = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_ABOUT_US_HERO . 'text_list', true);
$title_mb = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_ABOUT_US_HERO . 'title_mb', true);
$img_bg = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_ABOUT_US_HERO . 'img_bg', true);
?>
<section class="section sec-aboutHero">
    <div class="item-wrap">
        <?php if ( !wp_is_mobile() ) : ?>
            <div class="item-contentPc d-none d-xl-flex">
                <div class="item-img">
                    <?php echo wp_get_attachment_image( $img_pc, 'large', false, [
                        'class' => 'active'
                    ] ); ?>
                </div>

                <div class="item-text-left">
                    <div class="f-inner">
                        <div class="f-line"></div>
                        <div class="f-text"><?php echo esc_html( $title_pc ); ?></div>
                    </div>
                </div>

                <?php if ( is_array( $text_list ) ) : ?>
                    <div class="item-text-right">
                        <div class="f-inner">
                            <div class="f-line"></div>

                            <div class="f-text" data-text="<?php echo esc_attr( json_encode($text_list, JSON_UNESCAPED_UNICODE) ); ?>">
                                <?php echo esc_html( $text_list[0] ); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( wp_is_mobile() ) : ?>
            <div class="item-contentMb d-xl-none">
                <div class="container">
                    <h2 class="title-title uppercase fz-42"><?php echo wp_kses_post( $title_mb ); ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div class="item-bg">
            <div class="f-bgFix" data-bg-pc="<?php echo esc_url( $img_bg ); ?>" data-bg-mb="<?php echo esc_url( $img_bg ); ?>"></div>
        </div>
    </div>
</section>