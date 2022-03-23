<?php

namespace WDL\Controllers;

use WP_Query;

class UserController extends CoreController
{
    public function contact()
    {
        $this->show('views/contact.view');
    }
}