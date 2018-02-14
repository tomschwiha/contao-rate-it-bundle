<?php

use cgoIT\rateit\RateIt;

return array(
    'contao.simpleajax' => array(
        array(new RateIt(), 'doVote')
    ),
);
