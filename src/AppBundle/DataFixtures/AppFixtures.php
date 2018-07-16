<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-07-05
 * Time: 10:43
 */

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use AppBundle\Entity\Cars;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
            $faker = \Faker\Factory::create();
            for ($i = 0; $i < 150; $i++) {
            $product = new Cars();
//            $product->setBrand("aaaaaaaaaaa");
//            $product->setDescription("bbbbbbbbbbbbbb");
            $product->setBrand($faker->name);
            $product->setDescription($faker->text(700));
            $manager->persist($product);
        }

        $manager->flush();
    }
}