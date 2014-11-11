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

$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('tl_content_rateit','insert');
$GLOBALS['TL_DCA']['tl_content']['config']['ondelete_callback'][] = array('tl_content_rateit','delete');

/**
 * palettes
*/
$GLOBALS['TL_DCA']['tl_content']['palettes']['rateit'] = '{type_legend},type,rateit_title;{rateit_legend},rateit_active;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['gallery'] = $GLOBALS['TL_DCA']['tl_content']['palettes']['gallery'].';{rateit_legend},rateit_active';

/**
 * fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['rateit_title'] = array
(
  'label'                 => &$GLOBALS['TL_LANG']['tl_content']['rateit_title'],
  'default'               => '',
  'exclude'               => true,
  'inputType'             => 'text',
  'sql' 						  => "varchar(255) NOT NULL default ''",
  'eval'                  => array('mandatory'=>true, 'maxlength'=>255)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['rateit_active'] = array
(
  'label'						=> &$GLOBALS['TL_LANG']['tl_content']['rateit_active'],
  'exclude'						=> true,
  'inputType'					=> 'checkbox',
  'sql' 						   => "char(1) NOT NULL default ''",
  'eval'                   => array('tl_class'=>'w50')
);

/**
 * Class tl_content_rateit
*/
class tl_content_rateit extends rateit\DcaHelper {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}

	public function insert(\DC_Table $dc) {
		if ($dc->activeRecord->type == "gallery") {
			$type = 'galpic';

			if (version_compare(VERSION, '3.2', '>=')) {
				$objFiles = \FilesModel::findMultipleByUuids(deserialize($dc->activeRecord->multiSRC));
			} else {
				$objFiles = \FilesModel::findMultipleByIds(deserialize($dc->activeRecord->multiSRC));
			}
			
			if ($objFiles !== null) {
				// Get all images
				while ($objFiles->next()) {
					// Single files
					if ($objFiles->type == 'file') {
						$objFile = new \File($objFiles->path, true);
				
						if (!$objFile->isGdImage) {
							continue;
						}
				
						$this->insertOrUpdateRatingItemGallery($dc, $type, $objFile->name, $objFiles->id, ($dc->activeRecord->rateit_active ? '1' : ''));
					}
					// Folders
					else {
						if (version_compare(VERSION, '3.2', '>=')) {
							$objSubfiles = \FilesModel::findByPid($objFiles->uuid);
						} else {
							$objSubfiles = \FilesModel::findByPid($objFiles->id);
						}
				
						if ($objSubfiles === null) {
							continue;
						}
				
						while ($objSubfiles->next()) {
							// Skip subfolders
							if ($objSubfiles->type == 'folder') {
								continue;
							}
				
							$objFile = new \File($objSubfiles->path, true);
				
							if (!$objFile->isGdImage) {
								continue;
							}
				
							$this->insertOrUpdateRatingItemGallery($dc, $type, $objSubfiles->name, $objSubfiles->id, ($dc->activeRecord->rateit_active ? '1' : ''));
						}
					}
				}
			}
			return true;
		} else {
			return $this->insertOrUpdateRatingKey($dc, 'ce', $dc->activeRecord->rateit_title);
		}
	}

	public function delete(\DC_Table $dc) {
		if ($dc->activeRecord->type == "gallery") {
			if (version_compare(VERSION, '3.2', '>=')) {
				$objFiles = \FilesModel::findMultipleByUuids(deserialize($dc->activeRecord->multiSRC));
			} else {
				$objFiles = \FilesModel::findMultipleByIds(deserialize($dc->activeRecord->multiSRC));
			}

			// Get all images
			while ($objFiles->next()) {
				// Single files
				if ($objFiles->type == 'file') {
					$objFile = new \File($objFiles->path, true);
			
					if (!$objFile->isGdImage) {
						continue;
					}
					
					$rkey = $dc->activeRecord->id.'_'.$objFiles->id;
					$this->Database->prepare("DELETE FROM tl_rateit_items WHERE rkey=? and typ=?")
					               ->execute($rkey, 'galpic');
				}
				// Folders
				else {
					if (version_compare(VERSION, '3.2', '>=')) {
						$objSubfiles = \FilesModel::findByPid($objFiles->uuid);
					} else {
						$objSubfiles = \FilesModel::findByPid($objFiles->id);
					}
			
					if ($objSubfiles === null) {
						continue;
					}
			
					while ($objSubfiles->next()) {
						// Skip subfolders
						if ($objSubfiles->type == 'folder') {
							continue;
						}
			
						$objFile = new \File($objSubfiles->path, true);
			
						if (!$objFile->isGdImage) {
							continue;
						}
			
						$rkey = $dc->activeRecord->id.'_'.$objSubfiles->id;
						$this->Database->prepare("DELETE FROM tl_rateit_items WHERE rkey=? and typ=?")
						               ->execute($rkey, 'galpic');
					}
				}
			}
			return true;
		} else {
			return $this->deleteRatingKey($dc, 'ce');
		}
	}
	
	private function insertOrUpdateRatingItemGallery(\DC_Table &$dc, $type, $strName, $imgId, $active) {
		$rkey = $dc->activeRecord->id.'|'.$imgId;
		$headline = deserialize($dc->activeRecord->headline);
		$title = $dc->activeRecord->id;
		if (is_array($headline) && array_key_exists('value', $headline) && strlen($headline['value']) > 0) {
			$title = $headline['value'];
		}
		$ratingTitle = $title.' - '.$strName;
		$actRecord = $this->Database->prepare("SELECT * FROM tl_rateit_items WHERE rkey=? and typ=?")
		                            ->execute($rkey, $type)
		                            ->fetchAssoc();
		if (!is_array($actRecord)) {
			$arrSet = array('rkey' => $rkey,
					'tstamp' => time(),
					'typ' => $type,
					'createdat' => time(),
					'title'=> $ratingTitle,
					'active' => $active
			);
			$insertRecord = $this->Database->prepare("INSERT INTO tl_rateit_items %s")
			                               ->set($arrSet)
			                               ->execute()
			                               ->insertId;
		} else {
			$this->Database->prepare("UPDATE tl_rateit_items SET active=?, title=? WHERE rkey=? and typ=?")
			               ->execute($active, $ratingTitle, $rkey, $type)
			               ->updatedId;
		}
	}
}
?>