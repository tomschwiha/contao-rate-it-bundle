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
 * 
 */

// Be silenced
@error_reporting(0);
@ini_set("display_errors", 0);

/**
 * Runonce Job
 */
class runonceJob extends \Backend
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Run job
     */
    public function run()
    {
        if (!isset($GLOBALS['TL_CONFIG']['rating_type']))
        {
            $this->Config->add("\$GLOBALS['TL_CONFIG']['rating_type']", 'hearts');
        }

        if (!isset($GLOBALS['TL_CONFIG']['rating_count']))
        {
            $this->Config->add("\$GLOBALS['TL_CONFIG']['rating_count']", 5);
        }

        if (!isset($GLOBALS['TL_CONFIG']['rating_textposition']))
        {
            $this->Config->add("\$GLOBALS['TL_CONFIG']['rating_textposition']", 'after');
        }

        if (!isset($GLOBALS['TL_CONFIG']['rating_listsize']))
        {
            $this->Config->add("\$GLOBALS['TL_CONFIG']['rating_listsize']", 10);
        }

        if (!isset($GLOBALS['TL_CONFIG']['rating_template']))
        {
        	$this->Config->add("\$GLOBALS['TL_CONFIG']['rating_template']", 'rateit_default');
        }
    
        if (!isset($GLOBALS['TL_CONFIG']['rating_description']))
        {
            $this->Config->add("\$GLOBALS['TL_CONFIG']['rating_description']", '%current%/%max% %type% (%count% [Stimme|Stimmen])');
        }
    }
}

// Run once
$objRunonceJob = new runonceJob();
$objRunonceJob->run();

?>