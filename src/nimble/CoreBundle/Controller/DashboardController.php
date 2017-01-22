<?php

namespace nimble\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="nimble_dashboard")
     */
    public function dashboardAction()
    {
        return $this->render('@Core/dashboard/index.html.twig');
    }
}
