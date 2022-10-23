# gutenberg-block-pattern-register

## If Theme -

1. Create a file inside inc folder (exmaple: `block-patterns.php`) and call it inside as require once in functions.php.

```php
require_once('inc/block-patterns.php');
```

1. Use wordpress function `register_block_pattern` to register your blocks. In below snippet, I’m registering a code block with general args while categories and content can be modified. For categories, check step 3 and 4 for content.

```php
<?php
function register_block_patterns()
{
    if (function_exists('register_block_pattern')) {
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
```

1. Here our category name is ****************************************“Purehearts Blocks”.**************************************** We can create multiple categories at the same time, [check here](https://github.com/imranhsayed/aquila/blob/f5abf41fa02e39f3ee949d4ab76c8dff2a8e4815/inc/classes/class-block-patterns.php#L78). 

```
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
```

1. This function is called from `$code_content` variable in snippet 2. This fetches template parts which is shown in the 2nd snippet of step 4 which we set inside template_parts folder as named `template-code.php`.

```php
function get_pattern_content($template_path)
{

    ob_start();

    get_template_part($template_path);

    $pattern_content = ob_get_contents();

    ob_end_clean();

    return $pattern_content;
}
```

```php
<?php

/**
 * Template Name: Code Block
 */
?>

<!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide">
    <!-- wp:code {"style":{"color":{"background":"#2c3e50"}},"textColor":"white"} -->
    <pre class="wp-block-code has-white-color has-text-color has-background" style="background-color:#2c3e50">
    <code>
        Code here ....
</code></pre>
    <!-- /wp:code -->
</div>
<!-- /wp:group -->
```
