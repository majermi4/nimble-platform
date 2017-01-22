<?php

namespace nimble\CoreBundle\Model\Menu;

use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Menu\Matcher\Voter\VoterInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Voter based on the route
 * Extended RouteVoter from Knp\Menu\Matcher\Voter
 */
class MenuVoter implements VoterInterface
{
	/**
	 * @var Request
	 */
	private $request;

	public function __construct(RequestStack $requestStack)
	{
		$this->request = $requestStack->getCurrentRequest();
	}

	public function setRequest(Request $request)
	{
		$this->request = $request;
	}

	public function matchItem(ItemInterface $item)
	{
		if (null === $this->request) {
			return null;
		}

		$route = $this->request->attributes->get('_route');
		if (null === $route) {
			return null;
		}
		$routes = (array) $item->getExtra('routes', array());

		foreach ($routes as $testedRoute) {
			if (is_string($testedRoute)) {
				$testedRoute = array('route' => $testedRoute);
			}

			if (!is_array($testedRoute)) {
				throw new \InvalidArgumentException('Routes extra items must be strings or arrays.');
			}

			if ($this->isMatchingRoute($testedRoute)) {
				return true;
			}
		}

		return null;
	}

	private function isMatchingRoute(array $testedRoute)
	{
		$route = $this->request->attributes->get('_route');

		if (isset($testedRoute['route'])) {
			// ---- ADDED ---- to match routes which are related to that item
			if(substr($route, 0, strlen($testedRoute['route'])) === $testedRoute['route']) {
				return true;
			}
			// ----- end -----
			if ($route !== $testedRoute['route']) {
				return false;
			}
		} elseif (!empty($testedRoute['pattern'])) {
			if (!preg_match($testedRoute['pattern'], $route)) {
				return false;
			}
		} else {
			throw new \InvalidArgumentException('Routes extra items must have a "route" or "pattern" key.');
		}

		if (!isset($testedRoute['parameters'])) {
			return true;
		}

		$routeParameters = $this->request->attributes->get('_route_params', array());

		foreach ($testedRoute['parameters'] as $name => $value) {
			if (!isset($routeParameters[$name]) || $routeParameters[$name] !== (string) $value) {
				return false;
			}
		}

		return true;
	}
}