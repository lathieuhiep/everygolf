<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package BlankWP
 */

get_header(); ?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <h1 class="page-title"><?php esc_html_e('404', 'everygolf'); ?></h1>
        <p class="page-description"><?php esc_html_e('Xin lỗi, trang bạn đang tìm kiếm không tồn tại.', 'everygolf'); ?></p>

        <div class="error-actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="back-home-btn">
                <?php esc_html_e('Về trang chủ', 'everygolf'); ?>
            </a>
        </div>
    </section>
</main><!-- #primary -->

<?php get_footer(); ?>