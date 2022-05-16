<?php

$block_pattern_content = ' ---- INSERT CODE FROM EDITOR ---- ';

register_block_pattern(
    'themepatterns/example-block-pattern',
    [
        'categories'    => [
            'themepatterns',
        ],
        'content'       => $block_pattern_content,
        'description'   => 'An example block pattern',
        'keywords'      => 'example',
        'title'         => 'Example Block Pattern',
        'viewportWidth' => 800,
    ],
);

register_block_pattern_category(
    'themepatterns',
    [
        'label' => esc_html__( 'Theme Patterns', 'themepatterns' ),
    ]
);