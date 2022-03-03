<?php

namespace WDL;

use WDL\CustomPostType\CoreCustomPostType;
use WDL\CustomTaxonomy\CoreTaxonomy;

class Plugin
{
    /** @var RoleManager */
    protected $roleManager;

    /** @var WordpressRouter */
    protected $wordpressRouter;

    /** @var CoreCustomPostType[] */
    protected $customPostTypes = [];

    /** @var CoreTaxonomy[] */
    protected $customTaxonomies = [];


    public function __construct()
    {
        add_action(
            'init',
            [$this, 'initialize']
        );
    }

    public function initialize()
    {
        $this->roleManager = new RoleManager();
        // chargement du router wordpress
        $this->wordpressRouter = new WordpressRouter();

        $this->createCustomPostTypes();
        $this->createCustomTaxonomies();
    }

    protected function createCustomTaxonomies()
    {
        $taxonomiesDescriptors = $this->getTaxonomiesDescriptors();
        foreach($taxonomiesDescriptors as $identifier => $customOptions) {
            $this->customTaxonomies[$identifier] = new CoreTaxonomy(
                $identifier,
                $customOptions
            );
        }
    }


    protected function createCustomPostTypes()
    {
        $cptDescriptors = $this->getCPTDescriptors();
        foreach($cptDescriptors as $cptIdentifier => $customOptions) {
            // création du cpt
            $this->customPostTypes[$cptIdentifier] = new CoreCustomPostType(
                $cptIdentifier,
                $customOptions
            );
            $this->roleManager->giveAllCapabilitiesOnCPT($cptIdentifier, 'administrator');
        }
    }

    public function createCustomTables()
    {
        $customTables = $this->getCustomTablesNames();
        foreach($customTables as $className) {

            echo $className;
            echo PHP_EOL;

            $model = new $className();
            $model->createTable();
        }
    }


    public function activate()
    {
        $this->initialize();

        foreach($this->customTaxonomies as $customTaxonomy) {
            $customTaxonomy->createDefaultTerms();
        }

        $this->createCustomTables();
    }

    public function deactivate()
    {
        $this->initialize();
    }

    public function getCPTDescriptors()
    {
        return [];
    }

    protected function getTaxonomiesDescriptors()
    {
        return [];
    }

    protected function getCustomTablesNames()
    {
        return [];
    }
}
