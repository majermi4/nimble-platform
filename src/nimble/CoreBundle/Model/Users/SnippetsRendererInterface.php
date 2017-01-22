<?php

namespace nimble\CoreBundle\Model\Users;

use Twig_Environment;

Interface SnippetsRendererInterface
{

	/**
	 * This method returns the html shown in the user-panel area of the AdminLTE theme. More specifically, it is the area under the logo and above navigation.
	 * @param Twig_Environment $twig
	 * @return string The rendered template
	 */
	public function renderUserPanelSnippet(Twig_Environment $twig);

	/**
	 * This method returns html code which will be inserted into the top horizontal navigation of the AdminLTE theme. More specifically, it will be shown on the very right of the navigation and should include a dropdown list elements as defined by the AdminLTE theme.
	 * @param Twig_Environment $twig
	 * @return string The rendered template
	 */
	public function renderNavDropdownSnippet(Twig_Environment $twig);

}