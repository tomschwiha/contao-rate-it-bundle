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

namespace cgoIT\rateit;

class RateItPage extends \Frontend {
	
	/**
	 * Initialize the controller
	 */
	public function __construct() {
		parent::__construct();

		$this->loadDataContainer('settings');
	}
	
	public function outputFrontendTemplate($strContent, $strTemplate) {
		global $objPage;
		
		if ($objPage->addRating && !($strTemplate == $GLOBALS['TL_CONFIG']['rating_template'])) {
			$actRecord = $this->Database->prepare("SELECT * FROM tl_rateit_items WHERE rkey=? and typ='page'")
										->execute($objPage->id)
										->fetchAssoc();
			
			if ($actRecord['active']) {
				$this->import('rateit\\RateItRating', 'RateItRating');
				$this->RateItRating->rkey = $objPage->id;
				$this->RateItRating->generate();
				
				$rating = $this->RateItRating->output();
				$rating .= $this->includeJs();
				$rating .= $this->includeCss();
				
				$posMainDiv = strpos($strContent, '<div id="main">');
				$posInsideDiv = strpos($strContent, '<div class="inside">', $posMainDiv);
				
				$return = substr($strContent, 0, $posInsideDiv).'<div class="inside">';
				$return .= $rating;
				$return .= substr($strContent, $posInsideDiv + strlen('<div id="inside">') + 3);
				$strContent = $return;
			}
		}
		return $strContent;
	}

	private function includeCss() {
		$included = false;
		$strHeadTags = '';
		foreach ($GLOBALS['TL_CSS'] as $script) {
			if ($script == 'system/modules/rateit/public/css/rateit.css') {
				$included = true;
			}
		}

	    if (!$included) {
	    	$strHeadTags = '<link rel="stylesheet" href="'.$this->addStaticUrlTo('system/modules/rateit/public/css/rateit.css').'">';
	    	switch ($GLOBALS['TL_CONFIG']['rating_type']) {
	    		case 'hearts' :
	    			$strHeadTags .= '<link rel="stylesheet" href="'.$this->addStaticUrlTo('system/modules/rateit/public/css/heart.css').'">';
	    			break;
	    		default:
	    			$strHeadTags .= '<link rel="stylesheet" href="'.$this->addStaticUrlTo('system/modules/rateit/public/css/star.css').'">';
	    	}
	    }
		return $strHeadTags;
	}
	
	private function includeJs() {
		$included = false;
		$strHeadTags = '';
		foreach ($GLOBALS['TL_JAVASCRIPT'] as $script) {
			if ($script == 'system/modules/rateit/public/js/rateit.js') {
				$included = true;
			}
		}

	    if (!$included) {
	   		$strHeadTags = '<script' . (($objPage->outputFormat == 'xhtml') ? ' type="text/javascript"' : '') . ' src="' . $this->addStaticUrlTo('system/modules/rateit/public/js/onReadyRateIt.js') . '"></script>' . "\n";
	   		$strHeadTags .= '<script' . (($objPage->outputFormat == 'xhtml') ? ' type="text/javascript"' : '') . ' src="' . $this->addStaticUrlTo('system/modules/rateit/public/js/rateit.js') . '"></script>' . "\n";
	    }
	   	return $strHeadTags;
	}
}
?>