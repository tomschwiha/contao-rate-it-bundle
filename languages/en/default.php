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
$GLOBALS['TL_LANG']['FMD']['rateit'] = array('Rate It', 'Enables users to leave ratings for articles, pages, news and FAQs.');
$GLOBALS['TL_LANG']['FMD']['rateit_top_ratings'] = array('Rate It - Best/Most ratings', 'List of the x best ratings.');

/**
 * content Elements
 */
$GLOBALS['TL_LANG']['CTE']['rateit'] = array('Rate It', 'Enables users to leave ratings for articles, pages, news and FAQs.');

$GLOBALS['TL_LANG']['rateit']['rating_label'] = array('vote', 'votes');
$GLOBALS['TL_LANG']['rateit']['heart'] = 'heart';
$GLOBALS['TL_LANG']['rateit']['hearts'] = 'hearts';
$GLOBALS['TL_LANG']['rateit']['star'] = 'star';
$GLOBALS['TL_LANG']['rateit']['stars'] = 'stars';

/**
 * Fehler
 */
$GLOBALS['TL_LANG']['rateit']['error']['invalid_id'] = 'ERROR: Invalid ID for rating given.';
$GLOBALS['TL_LANG']['rateit']['error']['invalid_rating'] = 'ERROR: Invalid rating given.';
$GLOBALS['TL_LANG']['rateit']['error']['invalid_type'] = 'ERROR: Invalid type for rating given.';
$GLOBALS['TL_LANG']['rateit']['error']['duplicate_vote'] = 'ERROR: You may not vote more than once.';
$GLOBALS['TL_LANG']['rateit']['error']['duplicate_rkey'] = 'The unique identifier "% s" already exists for a rating. Please choose a different identifier.';
?>