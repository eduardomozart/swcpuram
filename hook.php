<?php
/**
 * Install hook
 *
 * @return boolean
 */
function plugin_swcpuram_install() {
   //do some stuff like instantiating databases, default values, ...
   global $DB;

   //instanciate migration with version
   $migration = new Migration(100);

   $query = "ALTER TABLE `glpi_networkequipments`
            ADD `memory` INT(11) NOT NULL DEFAULT '0' AFTER `ram`";
      $DB->queryOrDie($query, $DB->error());

   //execute the whole migration
   $migration->executeMigration();

   return true;
}

/**
 * Uninstall hook
 *
 * @return boolean
 */
function plugin_swcpuram_uninstall() {
   global $DB;

   $DB->queryOrDie(
         "ALTER TABLE `glpi_networkequipments`
            DROP `memory`;",
         $DB->error()
   );

   //to some stuff, like removing tables, generated files, ...
   return true;
}