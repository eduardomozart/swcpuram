## Show CPU-Memory Network Device Usage
![GitHub downloads](https://img.shields.io/github/downloads/eduardomozart/swcpuram/total.svg)

Restores the tab "SNMP" tab to display "**CPU usage (in %)**" and "**Memory usage (in %)**" for Network devices using GLPI Agent (ported from FusionInventory).

## Screenshot

![Show CPU-Memory Network Device Usage](screenshots/swcpuram.png)

## GLPI Agent modules

By default, this plug-in only provides "**CPU usage (in %)**". You can enhance GLPI Agent to parse "**Memory usage (%)**" as this plug-in re-introduces a legacy (discontinued) parameter (``MEMORY``) to store RAM usage data:

  * [Additional GLPI Agent modules](https://github.com/eduardomozart/ScriptUtil/tree/master/Scripts/GLPI/Agent/SNMP).

## ToDo

Create a custom table for the plug-in and uses it to store CPU and RAM usage historical data through a trigger on ``glpi_networkequipments`` GLPI DB table and plot them on a graph (similar to Network port metric statistics) with Zoom in/Zoom out support and/or allows to set up auto data purge period.

## Donate

You can help funding this plug-in through donations:

[![Donate with PayPal](pics/paypal-donate-button.png)](https://www.paypal.com/donate/?business=X67223DNZCKW2&no_recurring=1)

## Building

To create a new release of this plugin automatically through GitHub Actions (Workflow), edit the file ``swcpuram.xml`` to include the new version tag (e.g. ``1.0.1``), GLPI compatible version and download URL and create a new branch.

## Known issues

  * During the GLPI upgrade, the message that the GLPI database does not match the GLPI schema may appear because this plugin changes the ``glpi_networkequipments`` table structure to re-add the ``memory` column.

## Additional resources

* [Official website](https://github.com/eduardomozart/swcpuram)
* [Translations on Transifex service](https://www.transifex.com/eduardomozart/swcpuram/content/)
* [Issues](https://github.com/eduardomozart/swcpuram/issues)
