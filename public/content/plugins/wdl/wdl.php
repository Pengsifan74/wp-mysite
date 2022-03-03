<?php
/*
PLugin Name: WDL Starter
Description: Wonderland plugin starter kit
*/

use WDL\Plugin;

require __DIR__ . '/vendor-wdl/autoload.php';

$plugin = new Plugin();

register_activation_hook(
   __FILE__,
   [$plugin, 'activate']
);


register_deactivation_hook(
   __FILE__,
   [$plugin, 'deactivate']
);
