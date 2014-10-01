<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  cgo IT, 2012-2013
 * @author     Carsten Götzinger (info@cgo-it.de)
 * @package    aeo
 * @license    GNU/LGPL
 * @filesource
 */

/**
 * Name
 */
$GLOBALS['TL_LANG']['tl_settings']['rateit']                              = "Rate It";

/**
 * legends
 */
$GLOBALS['TL_LANG']['tl_settings']['rateit_legend']                      = 'Rate It-Einstellungen';

/**
 * fields
 */
$GLOBALS['TL_LANG']['tl_settings']['rating_type']             = array('Typ', 'Art der Darstellung. Mögliche Optionen sind "Herzen" oder "Sterne".');
$GLOBALS['TL_LANG']['tl_settings']['rating_count']            = array('Anzahl der Herzen/Sterne', 'Anzahl der Herzen/Sterne die dargestellt werden.');
$GLOBALS['TL_LANG']['tl_settings']['rating_textposition']     = array('Textposition', 'Gibt an, ob der Text ober- oder unterhalb der Herzen bzw. Sterne erscheinen soll.');
$GLOBALS['TL_LANG']['tl_settings']['rating_listsize']         = array('Anzahl Einträge', 'Anzahl der angezeigten Einträge pro Seite in der Darstellung der Bewertungen im Backend.');
$GLOBALS['TL_LANG']['tl_settings']['allow_duplicate_ratings'] = array('Doppelte Bewertungen zulassen', 'Darf mit der gleichen IP-Adresse mehrfach für das gleiche Rating abstimmen?');
$GLOBALS['TL_LANG']['tl_settings']['allow_duplicate_ratings_for_members'] = array('Doppelte Bewertungen für Mitglieder zulassen', 'Darf ein angemeldeter Frontendbenutzer mehrfach für das gleiche Rating abstimmen?');
$GLOBALS['TL_LANG']['tl_settings']['rating_template']         = array('Template', 'Hier können Sie das Template für die Bewertung auswählen.');
$GLOBALS['TL_LANG']['tl_settings']['rating_description']      = array('Beschriftung', 'Beschriftung für die einzelnen Ratings. Variablen werden dabei entsprechend ersetzt.<br>verfügbare Variablen:<br>%current% - aktuelle Bewertung<br>%max% - max. mögliche Bewertung<br>%type% - Art der Bewertung (Herzen/Sterne)<br>%count% - Anzahl abgegebener Stimmen<br>[Singular|Plural] - Text für abgegebene Stimmen<br><br>Beispiele:<br><br>%current%/%max% (%count% [Stimme|Stimmen]) liefert 3,7/5 Sterne (7 Stimmen)<br>%count% [Like|Likes] liefert 1 Like bzw. 4 Likes');

/**
 * options
 */
$GLOBALS['TL_LANG']['tl_settings']['hearts']                           = array('Herzen', 'Darstellung mit Herzen');
$GLOBALS['TL_LANG']['tl_settings']['stars']                            = array('Sterne', 'Darstellung mit Sternen');
$GLOBALS['TL_LANG']['tl_settings']['1']                                = array('1', '1');
$GLOBALS['TL_LANG']['tl_settings']['5']                                = array('5', '5');
$GLOBALS['TL_LANG']['tl_settings']['10']                               = array('10', '10');
$GLOBALS['TL_LANG']['tl_settings']['before']                           = array('oberhalb', 'Anzeige des Texts oberhalb der Herzen/Sterne');
$GLOBALS['TL_LANG']['tl_settings']['after']                            = array('unterhalb', 'Anzeige des Texts unterhalb der Herzen/Sterne');

?>
