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
$GLOBALS['TL_LANG']['tl_settings']['rateit_legend']                      = 'Rate It-Settings';

/**
 * fields
 */
$GLOBALS['TL_LANG']['tl_settings']['rating_type']             = array('Type', 'Type of representation. Possible options are the "hearts" or "stars".');
$GLOBALS['TL_LANG']['tl_settings']['rating_count']            = array('Number of hearts/stars', 'Number of hearts/stars which are shown.');
$GLOBALS['TL_LANG']['tl_settings']['rating_textposition']     = array('Text position', 'Specifies whether the text should appear above or below the hearts or stars.');
$GLOBALS['TL_LANG']['tl_settings']['rating_listsize']         = array('number of entries', 'Number of entries displayed per page in the representation of ratings in the backend.');
$GLOBALS['TL_LANG']['tl_settings']['allow_duplicate_ratings'] = array('Allow Duplicate votes', 'The same ip address may vote more than once for the same rating?');
$GLOBALS['TL_LANG']['tl_settings']['allow_duplicate_ratings_for_members'] = array('Allow Duplicate votes for members', 'A logged in frontend user may vote more than once for the same rating?');
$GLOBALS['TL_LANG']['tl_settings']['rating_template']         = array('Template', 'Here you can select the template for the rating.');
$GLOBALS['TL_LANG']['tl_settings']['rating_description']      = array('Label', 'Label for ratings. Variables are replaced<br>available variables: <br>%current% - current rating<br>%max% - max. possible rating<br>%type% - type of rating (hearts/stars)<br>%count% - number of votes<br>[singular|plural] - Text for votes<br><br>examples:<br >%current%/%max% (%count% [vote|votes]) returns 3.7/5 stars (7 votes)<br>%count% [Like|Likes] returns 1 Like or 4 Likes');

/**
 * options
 */
$GLOBALS['TL_LANG']['tl_settings']['hearts']                           = array('hearts', 'Illustration with hearts');
$GLOBALS['TL_LANG']['tl_settings']['stars']                            = array('stars', 'Illustration with stars');
$GLOBALS['TL_LANG']['tl_settings']['1']                                = array('1', '1');
$GLOBALS['TL_LANG']['tl_settings']['5']                                = array('5', '5');
$GLOBALS['TL_LANG']['tl_settings']['10']                               = array('10', '10');
$GLOBALS['TL_LANG']['tl_settings']['before']                           = array('above', 'Display the text above the hearts/stars');
$GLOBALS['TL_LANG']['tl_settings']['after']                            = array('below', 'Display the text below the heart / star');

?>
