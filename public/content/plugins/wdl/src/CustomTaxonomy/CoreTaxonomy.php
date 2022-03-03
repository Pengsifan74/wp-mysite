<?php
namespace WDL\CustomTaxonomy;

class CoreTaxonomy
{
    protected $identifier;
    protected $label;
    protected $customPostTypes = [];
    protected $hierarchical = false;

    protected $defaultTerms = [];

    public function __construct($identifier, array $customOptions)
    {
        $customPostTypes = $customOptions['customPostTypes'];

        $this->identifier = $identifier;
        $this->customPostTypes = $customPostTypes;

        if(array_key_exists('defaultTerms', $customOptions)) {
            $this->defaultTerms = $customOptions['defaultTerms'];
        }


        $defaultOptions =             [
            'show_in_rest' => true,
            'label' => $this->label,
            'hierarchical' => $this->hierarchical,
            'public' => true,
        ];

        $options = array_merge($defaultOptions, $customOptions);

        register_taxonomy(
            $this->identifier,
            $this->customPostTypes,
            $options
        );
    }

    public function createDefaultTerms()
    {
        foreach($this->defaultTerms as $term) {
            wp_create_term($term, $this->identifier);
        }
    }
}
