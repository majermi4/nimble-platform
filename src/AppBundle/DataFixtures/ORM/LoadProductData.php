<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Product;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('Product name');
        $product->setDescription('This is some product');
        $product->setPrice('250 Euro');

        $manager->persist($product);
        $manager->flush();
    }
}