<?php

namespace nimble\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends Controller
{
	/**
	 * @Route("/toggle_sidebar", name="nimble_toggle_sidebar")
	 */
	public function toggleSidebarAction()
	{
		$session = $this->get("session");
		if($session->get("sidebar-collapse"))
		{
			$session->set("sidebar-collapse", false);
		} else {
			$session->set("sidebar-collapse", true);
		}
		return new Response("OK");
	}
}
