<?php

namespace App\DataFixtures;

use App\Entity\Peak;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        $cords = [
            [
                'lat' => 39.61,
                'lon' => -105.02,
            ],
            [
                'lat' => 39.74,
                'lon' => -104.99,
            ],
            [
                'lat' => 39.73,
                'lon' => -104.8,
            ],
            [
                'lat' => 39.77,
                'lon' => -105.23,
            ],
            [
                'lat' => 39.79,
                'lon' => -105.10,
            ],
            [
                'lat' => 39.41,
                'lon' => -105.15,
            ],
            [
                'lat' => 39.91,
                'lon' => -104.31,
            ],
            [
                'lat' => 39.73,
                'lon' => -104.771,
            ],
            [
                'lat' => 39.452,
                'lon' => -105.124,
            ],
            [
                'lat' => 39.667,
                'lon' => -105.185,
            ]
        ];

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->text(30);
            $alt = $faker->numberBetween(30, 10000);
            $lat = $cords[$i]['lat'];
            $lon = $cords[$i]['lon'];
            $peak = new Peak($name,$alt,$lat,$lon);
            $manager->persist($peak);
        }

        $manager->flush();
    }
}
