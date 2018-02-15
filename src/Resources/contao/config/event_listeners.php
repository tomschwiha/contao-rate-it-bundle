<?php

use cgoIT\rateit\RateIt;
use SimpleAjax\Event\SimpleAjax;

if (class_exists(SimpleAjax::class)) {
    return array
    (
        SimpleAjax::NAME => array(
            array(
                array(new RateIt(), 'doVote'),
                RateIt::PRIORITY
            )
        )
    );
}

return array();
