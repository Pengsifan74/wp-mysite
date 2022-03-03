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
            'specie' => [
                'customPostTypes' => ['pet'],
                'label' => 'Species',
                'hierarchical' => false,
                'defaultTerms' => [
                    'Dog',
                    'Cat',
                    'Bird',
                    'Fish',
                ]
            ],
            'has-disease' => [
                'customPostTypes' => ['pet'],
                'label' => 'Diseases',
                'hierarchical' => false
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
