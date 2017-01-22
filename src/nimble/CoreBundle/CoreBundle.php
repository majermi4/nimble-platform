<?php

namespace nimble\CoreBundle;

use nimble\CoreBundle\DependencyInjection\Compiler\AddUsersSnippetsRendererPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CoreBundle extends Bundle
{
	public function build(ContainerBuilder $container)
	{
		parent::build($container);

		$container->addCompilerPass(new AddUsersSnippetsRendererPass());
	}
}
