<?php

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access this file directly");
}

/**
 * Manage network discovery prepare the task and give the configuration to the
 * agent.
 */
class PluginSwcpuramNetworkEquipment extends CommonDBTM {
   function getTabNameForItem(CommonGLPI $item, $withtemplate=0) {
      switch ($item::getType()) {
         case NetworkEquipment::getType():
            return __('GLPI Agent SNMP', 'swcpuram');
            break;
      }
      return '';
   }

   static function displayTabContentForItem(CommonGLPI $item, $tabnum=1, $withtemplate=0) {
      switch ($item::getType()) {
         case NetworkEquipment::getType():
            //display form for network equipments
            self::displayTabContentForNetworkEquipment($item);
            break;
      }
      return true;
   }

   static function displayTabContentForNetworkEquipment(NetworkEquipment $item) {
      global $DB;

      // Session::checkRight($this::$rightname, READ);
      
      $options['target'] = null;

      // Form item informations
      
      echo "<form method='post' name='snmp_form' id='snmp_form'
                 action=\"".$options['target']."\">";
      
      echo '<div class="spaced">';
      
      echo '<table class="tab_cadre_fixe">';
      echo '<tbody>';
      echo '<tr class="tab_bg_1">';
      echo '<th colspan="2">';
      echo __('SNMP information', 'swcpuram');
      echo '</th>';
      echo '</tr>';
      
      echo '<tr class="tab_bg_1">';
      echo '<td>';
      echo __('CPU usage (in %)', 'swcpuram');
      echo '</td>';
      echo '<td>';
      Html::displayProgressBar(250, $item->getField('cpu'),
                              ['simple' => true]);
      echo '</td>';
      echo '</tr>';
        
      echo '<tr class="tab_bg_1">';
      echo '<td>';
      echo __('Memory usage (in %)', 'swcpuram');
      echo '</td>';
      echo '<td align="center">';
      
        $ram_pourcentage = 0;
        if (!empty($item->getField('ram'))
            && !empty($item->getField('memory'))) {
            $ram_pourcentage = abs(ceil((100 * ($item->getField('memory') - $item->getField('ram'))) / $item->getField('ram')));
        }
        if ((($item->getField('ram') - $item->getField('memory')) < 0)
            || (empty($item->getField('memory')))) {
            echo "<center><strong>".__('No data available', 'swcpuram')."</strong></center>";
        } else {
            Html::displayProgressBar(250, $ram_pourcentage,
                           ['title' => " <strong>(".($item->getField('ram') - $item->getField('memory')).__('Mio')." / ".
                           $item->getField('ram').__('Mio').")</strong>"]);
        }
      
      echo "</td>";
      echo "</tr>";
      
      echo "</tbody>";
      echo "</table>";
      
      echo "</div>"; // <!-- .spaced -->
      
      echo '<div class="row"></div>';
      
      echo '<div class="card-body mx-n2 mb-4 border-top d-flex align-items-start flex-wrap justify-content-center">';
      echo Html::submit(__('Update'), ['name' => 'update']);
      echo '</div>';
      
      Html::closeForm();
   }
}