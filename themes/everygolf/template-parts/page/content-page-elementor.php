<?php
while ( have_posts() ) : the_post();
    the_content();

    everygolf_link_page();
endwhile;