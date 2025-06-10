<?php if (function_exists('pll_the_languages')) :
    $languages = pll_the_languages(array(
        'raw' => true,
        'hide_if_empty' => false,
        'show_flags' => 1,
        'show_names' => 1
    ));

    $custom_flags = [
        'vi' => 'lang-vn.png',
        'en' => 'lang-en.png'
    ];

    if (!empty($languages)) :
        $current_lang = null;

        foreach ($languages as $lang) {
            if ($lang['current_lang']) {
                $current_lang = $lang;
                break;
            }
        }

    ?>
        <div class="header__lang">
            <div class="select-lang">
                <?php
                if ($current_lang) :
                    $custom_flag = $custom_flags[$current_lang['slug']] ?? '';
                    ?>
                    <p class="select-lang__label">
                        <?php if (isset($custom_flag)) : ?>
                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/flags/' . $custom_flag)) ?>" alt="<?php echo esc_attr( $current_lang['name'] ); ?>" width="40" height="40">
                        <?php else : ?>
                            <?php echo $current_lang['flag']; ?>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>

                <ul class="select-lang__list">
                    <?php foreach ($languages as $lang) : ?>
                        <li>
                            <a href="<?php echo esc_url($lang['url']); ?>"
                               class="<?php echo $lang['current_lang'] ? 'current' : ''; ?>">
                                <?php echo esc_html(strtoupper($lang['slug'])); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php
    endif;
endif;