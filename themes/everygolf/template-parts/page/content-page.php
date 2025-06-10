<div class="site-page-content">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            the_content();
            everygolf_link_page();
        endwhile;
        ?>
    </div>
</div>
