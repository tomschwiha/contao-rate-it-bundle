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

/**
 * Class RateItTopRatingsModule
 */
class RateItTopRatingsModule extends RateItFrontend
{
	//protected $intStars = 5;
	
	/**
	 * Initialize the controller
	 */
	public function __construct($objElement) {
		parent::__construct($objElement);
		
		$this->strKey = "rateit_top_ratings";
	}

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate() {
		if (TL_MODE == 'BE') {
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### Rate IT Best/Most Ratings ###';
			$objTemplate->title = $this->name;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		$this->strTemplate = $this->rateit_template;
		
		$this->arrTypes = deserialize($this->rateit_types);

      $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/rateit/public/js/onReadyRateIt.js|static';
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/rateit/public/js/rateit.js|static';
		$GLOBALS['TL_CSS'][] = 'system/modules/rateit/public/css/rateit.min.css||static';
		switch ($GLOBALS['TL_CONFIG']['rating_type']) {
			case 'hearts' :
				$GLOBALS['TL_CSS'][] = 'system/modules/rateit/public/css/heart.min.css||static';
				break;
			default:
				$GLOBALS['TL_CSS'][] = 'system/modules/rateit/public/css/star.min.css||static';
		}
		
		return parent::generate();
	}

	/**
	 * Generate the module/content element
	 */
	protected function compile() {
		$this->Template = new \FrontendTemplate($this->strTemplate);
		
		$this->Template->setData($this->arrData);
		
		$this->import("\\Database", "Database");
		$arrResult = $this->Database->prepare("SELECT i.id AS item_id,
				i.rkey AS rkey,
				i.title AS title,
				i.typ AS typ,
				i.createdat AS createdat,
				i.active AS active,
				IFNULL(AVG(r.rating),0) AS best,
				COUNT( r.rating ) AS most
			FROM tl_rateit_items i
				LEFT OUTER JOIN tl_rateit_ratings r
					ON (i.id = r.pid)
			WHERE
				typ IN ('".implode("', '", $this->arrTypes)."')
			GROUP BY rkey, title, item_id, typ, createdat, active
			ORDER BY ".$this->rateit_toptype." DESC")
		  ->limit($this->rateit_count)
		  ->execute()
		  ->fetchAllAssoc();

		$objReturn = array();
		foreach ($arrResult as $result) {
			$return = new \stdClass();
			$return->title = $result['title'];
			$return->typ = $result['typ'];
			
			// ID ermitteln
			$stars = $this->percentToStars($result['best']);
			$return->rateItID = 'rateItRating-'.$result['rkey'].'-'.$result['typ'].'-'.
			             $stars.'_'.intval($GLOBALS['TL_CONFIG']['rating_count']);
			$return->descriptionId = 'rateItRating-'.$result['rkey'].'-description';
			
			$return->rateit_class = 'rateItRating';
			
			// Beschriftung ermitteln
			$rating = array();
			$rating['totalRatings'] = $result['most'];
			$rating['rating'] = $result['best'];
			$return->description = $this->getStarMessage($rating);
			
			$return->rating = $result['best'];
			$return->count = $result['most'];
			$return->rel = 'not-rateable';
			$objReturn[] = $return;
		}
		
		$this->Template->arrRatings = $objReturn;
	}
}

?>