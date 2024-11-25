<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\ProductProvider;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    private $productProvider;

    public function __construct(ProductProvider $productProvider)
    {
        $this->productProvider = $productProvider;
    }

    public function load(ObjectManager $manager): void
    {
        $pumpkins = $this->productProvider->getPumpkins();

        foreach ($pumpkins as $pumpkinData) {
            $pumpkin = new Product();
            $pumpkin->setname($pumpkinData['name']);
            $pumpkin->setType($pumpkinData['type']);
            $pumpkin->setResume($pumpkinData['resume']);
            $pumpkin->setDescription($pumpkinData['description']);
            $pumpkin->setPrice($pumpkinData['price']);
            $pumpkin->setPicture($pumpkinData['picture']);


            $manager->persist($pumpkin);
        }

        $manager->flush();
    }
}
