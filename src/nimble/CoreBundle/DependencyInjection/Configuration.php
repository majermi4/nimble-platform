<?php

namespace nimble\CoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('nimble');

	/*	$rootNode
			->children()
				->arrayNode('layout')
					->children()
						->scalarNode('app_name')->end()
						->scalarNode('logo_lg')->end()
						->scalarNode('logo_mini')->end()
						->scalarNode('index_route')->end()
						->scalarNode('theme_skin')->end()
					->end()
				->end()
				->arrayNode('site_owner')
					->children()
						->scalarNode('email')->end()
					->end()
				->end()
			->end();*/

		return $treeBuilder;
	}
}