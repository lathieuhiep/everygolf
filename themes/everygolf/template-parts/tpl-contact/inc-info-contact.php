<?php
if ( empty( $args ) ) return;
$prefix_cmb_contact_info = $args['prefix_cmb_contact_info'];
$prefix_cmb_contact_form = $args['prefix_cmb_contact_form'];

$phone = get_post_meta( get_the_ID(), $prefix_cmb_contact_info . 'phone', true );
$email = get_post_meta( get_the_ID(), $prefix_cmb_contact_info . 'email', true );
$website_url = get_post_meta( get_the_ID(), $prefix_cmb_contact_info . 'website_url', true );
$facebook_url = get_post_meta( get_the_ID(), $prefix_cmb_contact_info . 'facebook_url', true );
$image_id = get_post_meta( get_the_ID(), $prefix_cmb_contact_info . 'img_id', true );

$heading = get_post_meta( get_the_ID(), $prefix_cmb_contact_form . 'heading', true );
$contact_form = get_post_meta( get_the_ID(), $prefix_cmb_contact_form . 'select_cf7_form', true );
?>
<section class="section sec-lienhePage">
    <div class="container">
        <div class="item-contact">
            <div class="row">
                <div class="col-xl-7">
                    <div class="c-imgWrap wow fadeInUp">
                        <div class="c-img">
                            <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                        </div>

                        <div class="c-info">
                            <ul>
                                <?php if ( $phone ) : ?>
                                    <li>
                                        <a href="tel:<?php echo esc_attr( $phone ) ?>">
                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/phone.svg' ) ) ?>" alt="" width="25" height="25">
                                            <?php echo esc_html( $phone ) ?>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if ( $email ) : ?>
                                    <li>
                                        <a href="mailto:<?php echo esc_attr( $email ) ?>">
                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/mail.svg' ) ) ?>" alt="" width="25" height="25">
                                            <?php echo esc_html( $email ) ?>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if ( $website_url ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url( $website_url ) ?>">
                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/site.svg' ) ) ?>" alt="" width="25" height="25">
                                            <?php echo esc_html( $website_url ) ?>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if ( $facebook_url ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url( $facebook_url ) ?>">
                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/fb.svg' ) ) ?>" alt="" width="25" height="25">
                                            <?php echo esc_html( $facebook_url ) ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="c-body">
                        <h2 class="c-title uppercase fz-42 wow fadeInUp">
                            <?php echo esc_html( $heading ); ?>
                        </h2>

                        <?php if ( $contact_form ) : ?>
                            <?php echo do_shortcode( '[contact-form-7 id="' . $contact_form . '" ]' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>