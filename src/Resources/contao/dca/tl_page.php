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
 * @copyright  cgo IT, 2013
 * @author     Carsten Götzinger (info@cgo-it.de)
 * @package    rateit
 * @license    GNU/LGPL
 * @filesource
*/


use cgoIT\rateit\DcaHelper;

/**
 * Extend tl_page
 */

$GLOBALS['TL_DCA']['tl_page']['config']['onsubmit_callback'][] = array('tl_page_rateit','insert');
$GLOBALS['TL_DCA']['tl_page']['config']['ondelete_callback'][] = array('tl_page_rateit','delete');

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addRating';
foreach ($GLOBALS['TL_DCA']['tl_page']['palettes'] as $keyPalette => $valuePalette)
{
	// Skip if we have a array or the palettes for subselections
    if (is_array($valuePalette) || $keyPalette == "__selector__" || $keyPalette == "root" || $keyPalette == "forward" || $keyPalette == "redirect")
    {
        continue;
    }

    $valuePalette .= ';{rateit_legend:hide},addRating';

    // Write new entry back in the palette
    $GLOBALS['TL_DCA']['tl_page']['palettes'][$keyPalette] = $valuePalette;
}

/**
 * Add subpalettes to tl_page
 */
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addRating']  = 'rateit_position';

// Fields
$GLOBALS['TL_DCA']['tl_page']['fields']['addRating'] = array
(
  'label'						=> &$GLOBALS['TL_LANG']['tl_page']['addRating'],
  'exclude'						=> true,
  'inputType'					=> 'checkbox',
  'sql' 							=> "char(1) NOT NULL default ''",
  'eval'           		   => array('tl_class'=>'w50 m12', 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_page']['fields']['rateit_position'] = array
(
  'label'                  => &$GLOBALS['TL_LANG']['tl_page']['rateit_position'],
  'default'                => 'before',
  'exclude'                => true,
  'inputType'              => 'select',
  'options'                => array('after', 'before'),
  'reference'              => &$GLOBALS['TL_LANG']['tl_page'],
  'sql' 						   => "varchar(6) NOT NULL default ''",
  'eval'                   => array('mandatory'=>true, 'tl_class'=>'w50')
);

class tl_page_rateit extends DcaHelper {
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}

	public function insert(\DC_Table $dc) {
      return $this->insertOrUpdateRatingKey($dc, 'page', $dc->activeRecord->title);
	}

	public function delete(\DC_Table $dc)
	{
      return $this->deleteRatingKey($dc, 'page');
	}
}
?>
