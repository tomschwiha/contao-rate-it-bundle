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
$GLOBALS['TL_LANG']['tl_module']['rateit_legend'] = 'Rate It-Settings';

/**
 * fields
 */
$GLOBALS['TL_LANG']['tl_module']['rateit_title']    = array('Rating title', 'Rating title (shown in backend).');
$GLOBALS['TL_LANG']['tl_module']['rateit_active']   = array('Active', 'Active means that the review is visible to the front-end users.');
$GLOBALS['TL_LANG']['tl_module']['rateit_types']    = array('Types', 'Select the types for which you would like the best ratings to be displayed.');
$GLOBALS['TL_LANG']['tl_module']['rateit_count']    = array('Max. count', 'Max. count of displayed values.');
$GLOBALS['TL_LANG']['tl_module']['rateit_toptype']  = array('List type', 'The x best voted entries oder the x most voted entries.');
$GLOBALS['TL_LANG']['tl_module']['rateit_template'] = array('Template', 'Here you can select the template for the article\'s rating.');

$GLOBALS['TL_LANG']['tl_module']['rateit_types']['page']    = 'Page';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['article'] = 'Article';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['ce']      = 'Content Element';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['module']  = 'Module';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['news']    = 'News';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['faq']     = 'FAQ';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['galpic']  = 'Gallery Picture';
$GLOBALS['TL_LANG']['tl_module']['rateit_types']['news4ward']  = 'Blog entry';

$GLOBALS['TL_LANG']['tl_module']['rateit_toptype']['best']  = 'Best votes';
$GLOBALS['TL_LANG']['tl_module']['rateit_toptype']['most']  = 'Most votes';
?>