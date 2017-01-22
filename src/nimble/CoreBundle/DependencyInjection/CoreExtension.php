<?php

namespace nimble\CoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CoreExtension extends ConfigurableExtension
{
	/**
	 * Configures the passed container according to the merged configuration.
	 *
	 * @param array $mergedConfig
	 * @param ContainerBuilder $container
	 */
	protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
	{
		$loader = new YamlFileLoader(
			$container,
			new FileLocator(__DIR__.'/../Resources/config')
		);
		$loader->load('services.yml');

		//$container->setParameter("admin_lte.layout", $mergedConfig['layout']);
		//$container->setParameter("admin_lte.site_owner", $mergedConfig['site_owner']);
	}
}