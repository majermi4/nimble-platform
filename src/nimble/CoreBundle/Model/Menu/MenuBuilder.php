<?php

namespace nimble\CoreBundle\Model\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Translation\Translator;

class MenuBuilder
{
	/**
	 * @var MenuVoter
	 */
	private $menuVoter;

	/**
	 * @var FactoryInterface
	 */
	private $factory;

	/** @var array $strusture contains the data imported from menu.yml config file  */
	private $structure = [];

	/**
	 * @var Translator $translator
	 */
	private $translator;

	/**
	 * @param FactoryInterface $factory
	 * @param string $root_dir
	 * @param MenuVoter $menuVoter
	 *
	 * Add any other dependency you need
	 */
	public function __construct(FactoryInterface $factory, $root_dir, MenuVoter $menuVoter, Translator $translator)
	{
		$this->factory = $factory;
		$this->menuVoter = $menuVoter;
		$this->translator = $translator;

        $menuConfigPath = $root_dir.'/config/menu.yml';
        if(file_exists($menuConfigPath)) {
            $this->structure = Yaml::parse(file_get_contents($menuConfigPath));
        }
	}

	public function createMainMenu(array $options)
	{
		$menu = $this->factory->createItem('root');
		// Add sidebar-menu class to the main UL element
		$menu->setChildrenAttribute("class", "sidebar-menu");
		$menu->addChild('MainNavigation', array('label' => $this->translator->trans('Main navigation')))->setAttribute("class", "header");

		$itemResolver = $this->getItemOptionResolver();
		// Build menu based on config defined in app/config/menu.yml file
		if($this->structure !== null) {
			foreach ($this->structure as $itemLvl1_name => $itemLvl1) {
				$itemLvl1 = $itemResolver->resolve($itemLvl1);

				$menu->addChild($itemLvl1_name, array('route' => $itemLvl1['route'], 'uri' => $itemLvl1['uri'], 'label' => $itemLvl1['label'], 'attributes' => array("class" => "treeview"), 'extras' => array('icon' => $itemLvl1['icon'])));

				if (count($itemLvl1['children']) > 0) {
					$menu->getChild($itemLvl1_name)->setChildrenAttribute("class", "treeview-menu");
					foreach ($itemLvl1['children'] as $itemLvl2_name => $itemLvl2) {
						$itemLvl2 = $itemResolver->resolve($itemLvl2);
						$menu->getChild($itemLvl1_name)->addChild($itemLvl2_name, array('route' => $itemLvl2['route'], 'uri' => $itemLvl2['uri'], 'label' => $itemLvl2['label'], 'extras' => array("icon" => $itemLvl2['icon'])));

						if (count($itemLvl2['children']) > 0) {
							$menu->getChild($itemLvl1_name)->getChild($itemLvl2_name)->setChildrenAttribute("class", "treeview-menu");
							foreach ($itemLvl2['children'] as $itemLvl3_name => $itemLvl3) {
								$itemLvl3 = $itemResolver->resolve($itemLvl3);
								$menu->getChild($itemLvl1_name)->getChild($itemLvl2_name)->addChild($itemLvl3_name, array('route' => $itemLvl3['route'], 'uri' => $itemLvl3['uri'], 'label' => $itemLvl3['label'], 'extras' => array("icon" => $itemLvl3['icon'])));
							} // end: foreach
						} // end: if
					} // end: foreach
				} // end: if
			} // end: foreach
		} // end: if
		return $menu;
	}

	private function getItemOptionResolver()
	{
		$optionResolver = new OptionsResolver();
		$optionResolver->setRequired(array("label"));
		$optionResolver->setDefaults(array(
			"icon" => "",
			"uri" => false,
			"route" => false,
			"children" => array()
		));
		return $optionResolver;
	}

	public function createBreadcrumbMenu()
	{
		$mainMenu = $this->createMainMenu(array());
		$currentItem = $this->getCurrentMenuItem($mainMenu);

		if($currentItem == null)
		{
			return $this->factory->createItem('root');
		}
		return $currentItem;
	}

	public function getCurrentMenuItem($menu)
	{
		$voter = $this->menuVoter;

		foreach ($menu as $item)
		{
			if ($voter->matchItem($item)) {
				return $item;
			}

			if ($item->getChildren() && $currentChild = $this->getCurrentMenuItem($item)) {
				return $currentChild;
			}
		}

		return null;
	}

}