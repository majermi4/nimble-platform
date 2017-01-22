<?php

namespace nimble\CoreBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * This class was created to allow twig templates access the configuration variables from config.yml file.
 * It exposes the parameters from container which were set in nimble\CoreBundle\DependencyInjection\AdminLteExtension class.
 *
 * Class GlobalsExtension
 * @package nimble\CoreBundle\Twig
 */
class GlobalsExtension extends \Twig_Extension
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function getGlobals()
	{
		// Iterate through all 'admin_lte.layout' parameters and set global variables with their names and values
		$arr = array();
		foreach($this->container->getParameter('admin_lte.layout') as $name => $value)
		{
			$arr[$name] = $value;
		}
		return $arr;
	}

	public function getName()
	{
		return 'globals_extension';
	}
}