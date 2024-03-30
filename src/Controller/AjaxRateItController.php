<?php
/**
 * Created by PhpStorm.
 * User: darko
 * Date: 23.10.17
 * Time: 23:55
 */

namespace cgoIT\rateit\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use cgoIT\rateit\RateIt;

class AjaxRateItController extends AbstractController {
    /**
     * Handles rating requests.
     *
     * @return JsonResponse
     *
     * @Route("/rateit", name="ajax_rateit", defaults={"_scope" = "frontend", "_token_check" = false})
     */
    public function ajaxAction() {

        $this->container->get('contao.framework')->initialize();

        $controller = new RateIt();

        $response = $controller->doVote();
        $response->send();

        return new Response(null);
    }

}
