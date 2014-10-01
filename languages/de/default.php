<?php 

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
 * front end modules
 */
$GLOBALS['TL_LANG']['FMD']['rateit'] = array('Rate It', 'Bietet Benutzern die Möglichkeit Bewertungen für Artikel, Seiten, News und FAQs abzugeben.');
$GLOBALS['TL_LANG']['FMD']['rateit_top_ratings'] = array('Rate It - Beste/Meiste Bewertungen', 'Auflistung der x besten Bewertungen als Liste.');

/**
 * content Elements
 */
$GLOBALS['TL_LANG']['CTE']['rateit'] = array('Rate It', 'Bietet Benutzern die Möglichkeit Bewertungen für Artikel, Seiten, News und FAQs abzugeben.');

$GLOBALS['TL_LANG']['rateit']['rating_label'] = array('Stimme', 'Stimmen');
$GLOBALS['TL_LANG']['rateit']['heart'] = 'Herz';
$GLOBALS['TL_LANG']['rateit']['hearts'] = 'Herzen';
$GLOBALS['TL_LANG']['rateit']['star'] = 'Stern';
$GLOBALS['TL_LANG']['rateit']['stars'] = 'Sterne';

/**
 * Fehler
 */
$GLOBALS['TL_LANG']['rateit']['error']['invalid_id'] = 'ERROR: Ungültige ID für Rating angegeben.';
$GLOBALS['TL_LANG']['rateit']['error']['invalid_rating'] = 'ERROR: Ungültiges Rating angegeben.';
$GLOBALS['TL_LANG']['rateit']['error']['invalid_type'] = 'ERROR: Ungültiger Typ für Rating angegeben.';
$GLOBALS['TL_LANG']['rateit']['error']['duplicate_vote'] = 'ERROR: Sie dürfen nicht mehrfach abstimmen.';
$GLOBALS['TL_LANG']['rateit']['error']['duplicate_rkey'] = 'Der eindeutige Bezeichner "%s" für ein Rating existiert bereits. Bitte wählen Sie einen anderen Bezeichner.';
?>