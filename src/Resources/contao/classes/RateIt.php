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

use cgoIT\rateit\RateItFrontend;
use SimpleAjax\Event\SimpleAjax;
use Symfony\Component\HttpFoundation\JsonResponse;

class RateIt extends \Frontend {

	var $allowDuplicates = false;
	var $rateItFrontend;

	/**
	 * Initialize the controller
	 */
	public function __construct() {
		parent::__construct();

		$this->rateItFrontend = new RateItFrontend();

		$this->loadLanguageFile('default');
		$this->allowDuplicates = $GLOBALS['TL_CONFIG']['rating_allow_duplicate_ratings'];
		$this->allowDuplicatesForMembers = $GLOBALS['TL_CONFIG']['rating_allow_duplicate_ratings_for_members'];
	}

	/**
	 * doVote
	 *
	 * This is the function in charge of handling a vote and saving it to the
	 * database.
	 *
	 * NOTE: This method is meant to be called as part of an AJAX request.  As
	 * such, it unitlizes the die() function to display its errors.  THIS
	 * WOULD BE A VERY BAD FUNCTION TO CALL FROM WITHIN ANOTHER PAGE.
	 *
	 * @param integer id      - The id of key to register a rating for.
	 * @param integer percent - The rating in percentages.
	 */
	public function doVote(SimpleAjax $event) {
		$input = $event->getEnvironment()->getInputProvider();

    if ((true === $input->hasParameter('do'))
        && ('rateit' === $input->getParameter('do'))
    ) {
			$ip = $_SERVER['REMOTE_ADDR'];

			$rkey = $input->getParameter('id');
			$percent = $input->getParameter('vote');
			$type = $input->getParameter('type');

			//Make sure that the ratable ID is a number and not something crazy.
			if (strstr($rkey, '|')) {
				$arrRkey = explode('|', $rkey);
				foreach ($arrRkey as $key) {
					if (!is_numeric($key)) {
						$return = [$GLOBALS['TL_LANG']['rateit']['error']['invalid_rating']];
						$response = new JsonResponse($return);
						$event->setResponse($response);
						return $event;
					}
					$id = $rkey;
				}
			} else {
				if (is_numeric($rkey)) {
					$id = $rkey;
				} else {
					$return = [$GLOBALS['TL_LANG']['rateit']['error']['invalid_rating']];
					$response = new JsonResponse($return);
					$event->setResponse($response);
					return $event;
				}
			}

			//Make sure the percent is a number and under 100.
			if (is_numeric($percent) && $percent < 101) {
				$rating = $percent;
			} else {
				$return = [$GLOBALS['TL_LANG']['rateit']['error']['invalid_rating']];
				$response = new JsonResponse($return);
				$event->setResponse($response);
				return $event;
			}

			//Make sure that the ratable type is 'page' or 'ce' or 'module'
			if (!($type === 'page' || $type === 'article' || $type === 'ce' || $type === 'module' || $type === 'news' || $type === 'faq' || $type === 'galpic' || $type === 'news4ward')) {
				$return = [$GLOBALS['TL_LANG']['rateit']['error']['invalid_type']];
				$response = new JsonResponse($return);
				$event->setResponse($response);
				return $event;
			}

			$strHash = sha1(session_id() . (!$GLOBALS['TL_CONFIG']['disableIpCheck'] ? \Environment::get('ip') : '') . 'FE_USER_AUTH');

			// FrontendUser auslesen
			if (FE_USER_LOGGED_IN) {
				$objUser = $this->Database->prepare("SELECT pid FROM tl_session WHERE hash=?")
												  ->limit(1)
												  ->execute($strHash);

				if ($objUser->numRows) {
					$userId = $objUser->pid;
				}
			}


			$ratableKeyId = $this->Database->prepare('SELECT id FROM tl_rateit_items WHERE rkey=? and typ=?')
								->execute($id, $type)
								->fetchAssoc();

			$canVote = false;
			if (isset($userId)) {
				$countUser = $this->Database->prepare('SELECT * FROM tl_rateit_ratings WHERE pid=? and memberid=?')
								->execute($ratableKeyId['id'], $userId)
								->count();
			}
			$countIp = $this->Database->prepare('SELECT * FROM tl_rateit_ratings WHERE pid=? and ip_address=?')
			            ->execute($ratableKeyId['id'], $ip)
			            ->count();

			// Die with an error if the insert fails (duplicate IP or duplicate member id for a vote).
			if ((!$this->allowDuplicatesForMembers && (isset($countUser) ? $countUser == 0 : false)) || ($this->allowDuplicatesForMembers && isset($userId))) {
				// Insert the data.
				$arrSet = array('pid' => $ratableKeyId['id'],
							'tstamp' => time(),
							'ip_address' => $ip,
						   'memberid' => isset($userId) ? $userId : null,
							'rating' => $rating,
							'createdat'=> time()
					);
				$this->Database->prepare('INSERT INTO tl_rateit_ratings %s')
							   ->set($arrSet)
							   ->execute();
	      } elseif (!isset($countUser) && ((!$this->allowDuplicates && $countIp == 0) || $this->allowDuplicates)) {
				// Insert the data.
				$arrSet = array('pid' => $ratableKeyId['id'],
							'tstamp' => time(),
							'ip_address' => $ip,
					    'memberid' => isset($userId) ? $userId : null,
							'rating' => $rating,
							'createdat'=> time()
					);
				$this->Database->prepare('INSERT INTO tl_rateit_ratings %s')
							   ->set($arrSet)
							   ->execute();
	      } else {
					$return = [$GLOBALS['TL_LANG']['rateit']['error']['duplicate_vote']];
					$response = new JsonResponse($return);
					$event->setResponse($response);
					return $event;
	      }

			$rating = $this->rateItFrontend->loadRating($id, $type);

			$return = [$this->rateItFrontend->getStarMessage($rating)];
			$response = new JsonResponse($return);
			$event->setResponse($response);
			return $event;
		}
	}

}
?>
