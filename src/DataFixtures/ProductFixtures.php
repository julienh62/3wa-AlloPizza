<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($i=0; $i<6; $i++) {
            $product = new Product();
            $product->setName($faker->word())
                ->setImage('https://loremflickr.com/200/' . (200 + $i) . '/pizza')
                ->setPrice(random_int(7, 18) * 100)
                ->setIngredients($faker->words(5))
                ;

            $manager->persist($product);
        }

        $manager->flush();
    }
}
