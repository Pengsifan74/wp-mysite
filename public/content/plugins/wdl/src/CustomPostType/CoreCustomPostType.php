<?php
namespace WDL\CustomPostType;

class CoreCustomPostType
{
    protected $identifier;
    protected $label;
    protected $icon = 'dashicons-cart';
    protected $hierarchical = false;

    protected $supports = [
        'title',
        'excerpt',
        'thumbnail',
        'editor',
        'author',
    ];

    public function __construct($identifier, array $customOptions)
    {

        $this->identifier = $identifier;
        $defaultOptions = [
            'label' => $this->label,
            'show_in_rest' => true,
            'public' => true,
            'hierarchical' => $this->hierarchical,
            'menu_icon' => $this->icon,
            'has_archive' => true,
            'supports' => $this->supports,
            'capability_type' => $this->identifier,
            'map_meta_cap' => true,
        ];

        // DOC array_merge https://www.php.net/array_merge
        $options = array_merge($defaultOptions, $customOptions);

        register_post_type(
            $this->identifier,
            $options
        );
    }
}
