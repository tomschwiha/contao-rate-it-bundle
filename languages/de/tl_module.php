<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

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
 * @copyright  cgo IT, 2013
 * @author     Carsten Götzinger (info@cgo-it.de)
 * @package    rateit
 * @license    GNU/LGPL
 * @filesource
 */

/**
 * legends
 */
$GLOBALS['TL_LANG']['tl_module']['rateit_legend'] = 'Rate It-Einstellungen';

/**
 * fields
 */
$GLOBALS['TL_LANG']['tl_module']['rateit_title']    = array('Titel der Bewertung', 'Titel der Bewertung (wird im Backend angezeigt).');
$GLOBALS['TL_LANG']['tl_module']['rateit_active']   = array('Aktiv', 'Aktiv bedeutet, dass die Bewertung sichtbar für den Frontend-Nutzer ist.');
$GLOBALS['TL_LANG']['tl_module']['rateit_types']    = array('Typen', 'Art der Bewertung');
$GLOBALS['TL_LANG']['tl_module']['rateit_count']    = array('Max. Anzahl', 'Max. Anzahl anzuzeigender Einträge.');
$GLOBALS['TL_LANG']['tl_module']['rateit_toptype']  = array('Art der Liste', 'Die x bestbewerteten Einträge oder die x meistbewerteten Einträge.');
$GLOBALS['TL_LANG']['tl_module']['rateit_template'] = array('Template', 'Hier können Sie das Template für die Bewertung des Artikels auswählen.');

$GLOBALS['TL_LANG']['tl_module']['rateit_types']['page']    = 'Seite';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['article'] = 'Artikel';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['ce']      = 'Inhaltselement';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['module']  = 'Modul';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['news']    = 'Nachrichten';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['faq']     = 'FAQ';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['galpic']  = 'Galeriebild';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['news4ward']  = 'Beitrag';

$GLOBALS['TL_LANG']['tl_module']['rateit_toptype']['best']  = 'Beste Bewertungen';
$GLOBALS['TL_LANG']['tl_module']['rateit_toptype']['most']  = 'Meiste Bewertungen';
?>