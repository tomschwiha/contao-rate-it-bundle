<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
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
 * @copyright  cgo IT, 2014
 * @author     Carsten Götzinger (info@cgo-it.de)
 * @package    rateit
 * @license    GNU/LGPL
 * @filesource
*/

/**
 * Table tl_rateit_items
 */
$GLOBALS['TL_DCA']['tl_rateit_items'] = array (
	'config' => array (
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_rateit_ratings'),
		'switchToEdit'                => false,
		'sql' => array	(
			'keys' => array (
				'id' => 'primary'
			)
		)
	),
	
	'fields' => array	(
		'id' => array (
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array	(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array	(
			'sql'                     => "varchar(513) NOT NULL default ''"
		),
		'rkey' => array	(
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'typ' => array	(
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'createdat' => array	(
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'active' => array	(
			'sql'                     => "char(1) NOT NULL default ''"
		)
	)
);
