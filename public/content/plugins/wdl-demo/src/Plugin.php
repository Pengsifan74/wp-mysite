<?php

namespace WDLDemo;

use WDLDemo\Models\RatingModel;


class Plugin extends \WDL\Plugin
{

    public function getCPTDescriptors()
    {
        // appel de la méthode getCPTDescriptors de la classe parent : \WDL\Plugin
        parent::getCPTDescriptors();

        return [
            'education' => [
                'label' => 'Educations',
                'menu_icon' => 'dashicons-welcome-learn-more'
            ],
            'experience' => [
                'label' => 'Experiences',
                'menu_icon' => 'dashicons-businessman'
            ],
            'project' => [
                'label' => 'Projects',
                'menu_icon' => 'dashicons-hammer'
            ],
        ];
    }

    protected function getTaxonomiesDescriptors()
    {
        parent::getTaxonomiesDescriptors();

        return [
            'school' => [
                'customPostTypes' => ['education'],
                'label' => 'Schools',
                'hierarchical' => false,
            ],
            'city' => [
                'customPostTypes' => ['education', 'experience'],
                'label' => 'Cities',
                'hierarchical' => false,
            ],
            'country' => [
                'customPostTypes' => ['education', 'experience'],
                'label' => 'Countries',
                'hierarchical' => false,
            ],
            'technology' => [
                'customPostTypes' => ['project'],
                'label' => 'Technologies',
                'hierarchical' => false,
            ]
        ];
    }

    public function getCustomTablesNames()
    {
        return [
            RatingModel::class,
        ];
    }
}
