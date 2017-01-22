<?php

namespace nimble\CoreBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class AddUsersSnippetsRendererPass implements CompilerPassInterface
{

	/**
	 * You can modify the container here before it is dumped to PHP code.
	 *
	 * @param ContainerBuilder $container
	 */
	public function process(ContainerBuilder $container)
	{
	/*
	    TODO:
	if (false === $container->hasDefinition('admin_lte.twig.users')) {
			return;
		}

		$definition = $container->getDefinition('admin_lte.twig.users');

		foreach ($container->findTaggedServiceIds('admin_lte.users.snippets_renderer') as $id => $attributes) {
			$definition->addMethodCall('addSnippetRenderer', array(new Reference($id)));
		}
*/
	}

}