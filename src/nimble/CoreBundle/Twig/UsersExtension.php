<?php

namespace nimble\CoreBundle\Twig;

use nimble\CoreBundle\Model\Users\SnippetsRendererInterface;
use Twig_Environment;

class UsersExtension extends \Twig_Extension
{

	/** @var SnippetsRendererInterface $snippetsRenderer */
	private $snippetsRenderer = null;

	/**
	 * The snipper renderer is provided by another bundle which handles the user management. The third party bundle must provide a service which implements the SnippetsRendererInterface and is tagged as "admin_lte.users.snippets_renderer"
	 *
	 * @param SnippetsRendererInterface $snippetsRenderer
	 */
	public function addSnippetRenderer(SnippetsRendererInterface $snippetsRenderer)
	{
		$this->snippetsRenderer = $snippetsRenderer;
	}

	public function getFunctions()
	{
		return array(
			new \Twig_SimpleFunction('users_nav_dropdown', array($this, 'renderNavDropdown'), array(
				'is_safe' => array('html'),
				'needs_environment' => true
			)),
			new \Twig_SimpleFunction('user_panel', array($this, 'renderUserPanel'), array(
				'is_safe' => array('html'),
				'needs_environment' => true
			))
		);
	}

	public function renderNavDropdown(Twig_Environment $twig)
	{
		if($this->snippetsRenderer === null) {
			return "";
		}
		return $this->snippetsRenderer->renderNavDropdownSnippet($twig);
	}

	public function renderUserPanel(Twig_Environment $twig)
	{
		if($this->snippetsRenderer === null) {
			return "";
		}
		return $this->snippetsRenderer->renderUserPanelSnippet($twig);
	}

	public function getName()
	{
		return 'users_extension';
	}
}