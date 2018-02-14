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
 * @copyright  cgo IT, 2012-2013
 * @author     Carsten Götzinger (info@cgo-it.de)
 * @package    aeo
 * @license    GNU/LGPL
 * @filesource
 */

/**
 * palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default']  .= ';{rateit_legend:hide},rating_type,rating_count,rating_textposition,rating_listsize,rating_allow_duplicate_ratings,rating_allow_duplicate_ratings_for_members,rating_template,rating_description';

/**
 * fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_type'] = array
(
      'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rating_type'],
      'default'                 => 'hearts',
      'exclude'                 => true,
      'inputType'               => 'select',
      'options'                 => array('hearts', 'stars'),
      'reference'               => &$GLOBALS['TL_LANG']['tl_settings'],
	  'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_count'] = array
(
      'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rating_count'],
      'default'                 => '5',
      'exclude'                 => true,
      'inputType'               => 'select',
      'options'                 => array('1', '5', '10'),
      'reference'               => &$GLOBALS['TL_LANG']['tl_settings'],
	  'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_textposition'] = array
(
      'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rating_textposition'],
	  'default'                 => 'after',
      'exclude'                 => true,
      'inputType'               => 'select',
      'options'                 => array('after', 'before'),
      'reference'               => &$GLOBALS['TL_LANG']['tl_settings'],
      'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_listsize'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rating_listsize'],
		'exclude'                 => true,
		'default'                 => 10,
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>false, 'maxlength'=>4, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_allow_duplicate_ratings'] = array
(
	  'exclude'                 => true,
	  'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['allow_duplicate_ratings'],
	  'inputType'               => 'checkbox',
	  'eval'                    => array('tl_class'=>'w50 m12')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_allow_duplicate_ratings_for_members'] = array
(
	  'exclude'                 => true,
	  'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['allow_duplicate_ratings_for_members'],
	  'inputType'               => 'checkbox',
	  'eval'                    => array('tl_class'=>'w50 m12')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rating_template'],
	'default'                 => 'rateit_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_settings_rateit', 'getRateItTemplates'),
	'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rating_description'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['rating_description'],
		'exclude'                 => true,
		'default'                 => '%current%/%max% %type% (%count% [Stimme|Stimmen])',
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>true, 'allowHtml'=>true, 'tl_class'=>'w50')
);
?>
