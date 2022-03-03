<?php

namespace WDL;

class RoleManager
{

    public function deletePlayerRole()
    {
        remove_role('player');
    }

    public function createPlayerRole()
    {
        add_role(
            'player',
            'Player',
            [
                'delete_events' => true,
                'delete_private_events' => true,
                'delete_published_events' => true,
                'edit_events' => true,
                'edit_private_events' => true,
                'edit_published_events' => true,
                'publish_events' => true,
                'read_private_events' => true,
            ]
        );
    }

    public function giveAllCapabilitiesOnCPT($cptName, $role)
    {

        if(is_array($role)) {
            foreach($role as $roleName) {
                $this->giveAllCapabilitiesOnCPT($cptName, $roleName);
            }
        }
        else {
            $role = get_role($role);

            // on ajoute chacune des capabilties au rôle choisi
            $capabilities = [
                'delete_' . $cptName . 's',
                'delete_others_' . $cptName . 's',
                'delete_private_' . $cptName . 's',
                'delete_published_' . $cptName . 's',
                'edit_' . $cptName . 's',
                'edit_others_' . $cptName . 's',
                'edit_private_' . $cptName . 's',
                'edit_published_' . $cptName . 's',
                'publish_' . $cptName . 's',
                'read_private_' . $cptName . 's',
            ];

            foreach($capabilities as $capability) {
                $role->add_cap($capability);
            }
        }
    }
}
