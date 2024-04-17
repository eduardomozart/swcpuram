<?php

define('SWCPURAM_VERSION', '1.0.0');

/**
 * Init the hooks of the plugins - Needed
 *
 * @return void
 */
function plugin_init_swcpuram() {
   global $PLUGIN_HOOKS;

   //required!
   $PLUGIN_HOOKS['csrf_compliant']['swcpuram'] = true;

   //some code here, like call to Plugin::registerClass(), populating PLUGIN_HOOKS, ...
   Plugin::registerClass(
        'PluginSwcpuramNetworkEquipment',
        ['addtabon'          => 'NetworkEquipment']
    );
}

/**
 * Get the name and the version of the plugin - Needed
 *
 * @return array
 */
function plugin_version_swcpuram() {
   return [
      'name'           => 'Show CPU-Memory Network Device Usage',
      'version'        => SWCPURAM_VERSION,
      'author'         => 'Eduardo Mozart de Oliveira',
      'license'        => 'GLPv3',
      'homepage'       => 'http://github.com/eduardomozart/swcpuram',
      'requirements'   => [
         'glpi'   => [
            'min' => '10.0.0'
         ]
      ]
   ];
}

/**
 * Optional : check prerequisites before install : may print errors or add to message after redirect
 *
 * @return boolean
 */
function plugin_swcpuram_check_prerequisites() {
   //do what the checks you want
   return true;
}

/**
 * Check configuration process for plugin : need to return true if succeeded
 * Can display a message only if failure and $verbose is true
 *
 * @param boolean $verbose Enable verbosity. Default to false
 *
 * @return boolean
 */
function plugin_swcpuram_check_config($verbose = false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      echo "Installed, but not configured";
   }
   return false;
}

/**
 * Optional: defines plugin options.
 *
 * @return array
 */
function plugin_swcpuram_options() {
   return [
      Plugin::OPTION_AUTOINSTALL_DISABLED => true,
   ];
}