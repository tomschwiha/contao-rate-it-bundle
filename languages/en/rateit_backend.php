<?php 

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * Core translations are managed using Transifex. To create a new translation
 * or to help to maintain an existing one, please register at transifex.com.
 * 
 * @link http://help.transifex.com/intro/translating.html
 * @link https://www.transifex.com/projects/p/contao/language/de/
 * 
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

$GLOBALS['TL_LANG']['tl_rateit']['goback'] = 'Back';
$GLOBALS['TL_LANG']['tl_rateit']['noratingsfound'] = 'No matching ratings found.';
$GLOBALS['TL_LANG']['tl_rateit']['showdetails'] = 'Detailview';
$GLOBALS['TL_LANG']['tl_rateit']['byorder'] = 'By %s';
$GLOBALS['TL_LANG']['tl_rateit']['seltyp'][0] = 'Type';
$GLOBALS['TL_LANG']['tl_rateit']['seltyp'][1] = 'Please choose the rating type.';
$GLOBALS['TL_LANG']['tl_rateit']['selactive'][0] = 'Active/Inactive';
$GLOBALS['TL_LANG']['tl_rateit']['selactive'][1] = 'Please choose whether you want to display only active or inactive ratings.';
$GLOBALS['TL_LANG']['tl_rateit']['typ'][0] = 'Type';
$GLOBALS['TL_LANG']['tl_rateit']['typ'][1] = 'Rating type (rating for an "article", a "page", a "news" or a "faq")';
$GLOBALS['TL_LANG']['tl_rateit']['title'][0] = 'Title';
$GLOBALS['TL_LANG']['tl_rateit']['title'][1] = 'Title of the article, page, news or faq, on which the rating is included.';
$GLOBALS['TL_LANG']['tl_rateit']['createdat'][0] = 'activated since';
$GLOBALS['TL_LANG']['tl_rateit']['createdat'][1] = 'Day from which this rating has been enabled in the format "%s"';
$GLOBALS['TL_LANG']['tl_rateit']['status'][0] = 'Status';
$GLOBALS['TL_LANG']['tl_rateit']['status'][1] = 'Indicates whether this rating is currently enabled or not.';
$GLOBALS['TL_LANG']['tl_rateit']['rating'][0] = 'Rating';
$GLOBALS['TL_LANG']['tl_rateit']['rating'][1] = 'actual rating';
$GLOBALS['TL_LANG']['tl_rateit']['overall_rating'][0] = 'Overall rating';
$GLOBALS['TL_LANG']['tl_rateit']['overall_rating'][1] = 'actual overall rating';
$GLOBALS['TL_LANG']['tl_rateit']['totalratings'][0] = 'Total votes';
$GLOBALS['TL_LANG']['tl_rateit']['totalratings'][1] = 'Number of votes for this rating';
$GLOBALS['TL_LANG']['tl_rateit']['ratingfmt'] = '%s/%d (%d Votes)';
$GLOBALS['TL_LANG']['tl_rateit']['ratingviewfmt'] = '%s/%d';
$GLOBALS['TL_LANG']['tl_rateit']['ratingstatisticsfmt'] = 'Rating %s: %d of %d votes (corresponds %s%%)';
$GLOBALS['TL_LANG']['tl_rateit']['statistics'][0] = 'Statistics';
$GLOBALS['TL_LANG']['tl_rateit']['statistics'][1] = 'Statistics';
$GLOBALS['TL_LANG']['tl_rateit']['rating_chart_legend'][0] = 'Distribution of ratings';
$GLOBALS['TL_LANG']['tl_rateit']['rating_chart_legend'][1] = 'Count of ratings';
$GLOBALS['TL_LANG']['tl_rateit']['rating_chart_legend'][2] = 'Rating';
$GLOBALS['TL_LANG']['tl_rateit']['rating_chart_legend'][3] = 'Count';
$GLOBALS['TL_LANG']['tl_rateit']['month_chart_legend'][0] = 'Ratings per month';
$GLOBALS['TL_LANG']['tl_rateit']['month_chart_legend'][1] = 'Ratings per month';
$GLOBALS['TL_LANG']['tl_rateit']['month_chart_legend'][2] = 'Average rating';
$GLOBALS['TL_LANG']['tl_rateit']['month_chart_legend'][3] = 'Month';
$GLOBALS['TL_LANG']['tl_rateit']['month_chart_legend'][4] = 'Count';
$GLOBALS['TL_LANG']['tl_rateit']['ratings'][0] = 'Ratings';
$GLOBALS['TL_LANG']['tl_rateit']['ratings'][1] = 'List of all ratings';
$GLOBALS['TL_LANG']['tl_rateit']['ip'][0] = 'IP address';
$GLOBALS['TL_LANG']['tl_rateit']['member'][0] = 'Frontend member';
$GLOBALS['TL_LANG']['tl_rateit']['createdatdetail'][0] = 'Valuation Point';
$GLOBALS['TL_LANG']['tl_rateit']['vote'][0] = 'vote';
$GLOBALS['TL_LANG']['tl_rateit']['vote'][1] = 'votes';

$GLOBALS['TL_LANG']['tl_rateit']['clearratings'] = 'Reset selected ratings';

$GLOBALS['TL_LANG']['tl_rateit_type_options']['page'] = 'Page';
$GLOBALS['TL_LANG']['tl_rateit_type_options']['article'] = 'Article';
$GLOBALS['TL_LANG']['tl_rateit_type_options']['news'] = 'News';
$GLOBALS['TL_LANG']['tl_rateit_type_options']['faq'] = 'FAQ';
$GLOBALS['TL_LANG']['tl_rateit_type_options']['ce'] = 'Content element';
$GLOBALS['TL_LANG']['tl_rateit_type_options']['module'] = 'Module';
$GLOBALS['TL_LANG']['tl_rateit_type_options']['galpic'] = 'Gallery picture';
$GLOBALS['TL_LANG']['tl_rateit_order_options']['rating desc'] = 'Rating';
$GLOBALS['TL_LANG']['tl_rateit_order_options']['title'] = 'Title';
$GLOBALS['TL_LANG']['tl_rateit_order_options']['typ'] = 'Type';
$GLOBALS['TL_LANG']['tl_rateit_order_options']['createdat'] = 'Activation date';
$GLOBALS['TL_LANG']['tl_rateit_active_options']['0'] = 'inactive';
$GLOBALS['TL_LANG']['tl_rateit_active_options']['1'] = 'active';

$GLOBALS['TL_LANG']['tl_rateit']['xls_sheetname_ratings'] = 'Ratings';
$GLOBALS['TL_LANG']['tl_rateit']['xls_sheetname_rating'] = 'Rating';

$GLOBALS['TL_LANG']['tl_rateit']['xls_headers'] = array('rkey'=>'Rating-Key', 'typ'=>'Type', 'title'=>'Title',
                                                        'createdat'=>'Activation date', 'active'=>'Active',
                                                        'rating'=>'Rating', 'stars'=>'Max. Rating',
                                                        'percent'=>'Rating in percent', 'totalRatings'=>'Total votes');
$GLOBALS['TL_LANG']['tl_rateit']['xls_headers_detail'] = array('ip'=>'IP address', 'member'=>'Frontend member', 'rating'=>'Rating', 'percent'=>'Rating in percent', 
                                                               'createdat'=>'Valuation Point');
