<?php

namespace App\DataFixtures;

use App\Entity\CategoryShop;
use App\Entity\Product;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++) {
            $category = $this->getReference('CategoryShop-'. $faker->numberBetween(1, 2));
            $product = new Product();
            $product->setTitle($faker->sentence);
            $product->setSlug($faker->slug);
            $product->setContent($faker->text);
            $product->setOnline(true);
            $product->setSlug($faker->slug);
            $product->setSubtitle($faker->text(30));
            $product->setPrice($faker->randomFloat(2));
            $product->setCategory($category);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
