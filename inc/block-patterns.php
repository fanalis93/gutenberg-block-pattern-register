<?php




function register_block_patterns()
{
    if (function_exists('register_block_pattern')) {
        $cover_content = get_pattern_content('template_part/template-cover');
        register_block_pattern(
            'purehearts/my-cover',
            array(
                'title'       => __('Block Cover Pattern', 'purehearts'),
                'description' => __('Block Cover pattern description', 'purehearts'),
                'categories' => ['purehearts'],
                'content'     => $cover_content,
            )
        );
        $code_content = get_pattern_content('template_part/template-code');
        register_block_pattern(
            'purehearts/my-code',
            array(
                'title'       => __('Block Code Pattern', 'purehearts'),
                'description' => __('Block Code pattern description', 'purehearts'),
                'categories' => ['purehearts'],
                'content'     => $code_content,
            )
        );
    }
}
add_action('init', 'register_block_patterns');
function get_pattern_content($template_path)
{

    ob_start();

    get_template_part($template_path);

    $pattern_content = ob_get_contents();

    ob_end_clean();

    return $pattern_content;
}
function wpdocs_block_pattern_category()
{
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'purehearts',

            array('label' => __('Purehearts Blocks', 'purehearts'))
        );
    }
}

add_action('init', 'wpdocs_block_pattern_category');
