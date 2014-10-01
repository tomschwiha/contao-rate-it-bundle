<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Rateit
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'cgoIT',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'cgoIT\rateit\DcaHelper'              => 'system/modules/rateit/classes/DcaHelper.php',
	'cgoIT\rateit\RateItArticle'          => 'system/modules/rateit/classes/RateItArticle.php',
	'cgoIT\rateit\RateItBackend'          => 'system/modules/rateit/classes/RateItBackend.php',
	'cgoIT\rateit\RateItCE'               => 'system/modules/rateit/classes/RateItCE.php',
	'cgoIT\rateit\RateItFaq'              => 'system/modules/rateit/classes/RateItFaq.php',
	'cgoIT\rateit\RateItFrontend'         => 'system/modules/rateit/classes/RateItFrontend.php',
	'cgoIT\rateit\RateItHybrid'           => 'system/modules/rateit/classes/RateItHybrid.php',
	'cgoIT\rateit\RateItModule'           => 'system/modules/rateit/classes/RateItModule.php',
	'cgoIT\rateit\RateItNews'             => 'system/modules/rateit/classes/RateItNews.php',
	'cgoIT\rateit\RateItPage'             => 'system/modules/rateit/classes/RateItPage.php',
	'cgoIT\rateit\RateItRating'           => 'system/modules/rateit/classes/RateItRating.php',
	'cgoIT\rateit\RateItBackendModule'    => 'system/modules/rateit/classes/RateItBackendModule.php',
	'cgoIT\rateit\RateItTopRatingsModule' => 'system/modules/rateit/classes/RateItTopRatingsModule.php',
	'cgoIT\rateit\RateIt'                 => 'system/modules/rateit/public/php/rateit.php',
	'simple_html_dom'                     => 'system/modules/rateit/classes/extern/simple_html_dom.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'article_rateit_default'                      => 'system/modules/rateit/templates',
	'article_rateit_default_microdata'            => 'system/modules/rateit/templates',
	'gallery_rateit_default'                      => 'system/modules/rateit/templates',
	'j_colorbox_rateit'                           => 'system/modules/rateit/templates',
	'mod_article_list_rateit'                     => 'system/modules/rateit/templates',
	'mod_article_rateit_default_microdata_teaser' => 'system/modules/rateit/templates',
	'mod_article_rateit_default_teaser'           => 'system/modules/rateit/templates',
	'mod_rateit_top_ratings'                      => 'system/modules/rateit/templates',
	'moo_mediabox_rateit'                         => 'system/modules/rateit/templates',
	'news_full_rateit'                            => 'system/modules/rateit/templates',
	'news_full_rateit_microdata'                  => 'system/modules/rateit/templates',
	'news_latest_rateit'                          => 'system/modules/rateit/templates',
	'news_latest_rateit_microdata'                => 'system/modules/rateit/templates',
	'news_short_rateit'                           => 'system/modules/rateit/templates',
	'news_short_rateit_microdata'                 => 'system/modules/rateit/templates',
	'news_simple_rateit'                          => 'system/modules/rateit/templates',
	'news_simple_rateit_microdata'                => 'system/modules/rateit/templates',
	'rateitbe_ratinglist'                         => 'system/modules/rateit/templates',
	'rateitbe_ratingview'                         => 'system/modules/rateit/templates',
	'rateit_default'                              => 'system/modules/rateit/templates',
	'rateit_microdata'                            => 'system/modules/rateit/templates',
));
