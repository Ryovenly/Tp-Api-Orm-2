<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Style;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
      $this->encoder = $encoder; 
    }
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');


        // fixtures Artist
        $artists = [];

        for ($i = 0; $i < 40; $i++) {
          $artist = new Artist();
          $artist->setName($faker->word(1, true));
          $artist->setStartYear($faker->numberBetween($min = 1980, $max = 2020));
          $artist->setCreated(new \Datetime());

    
          $manager->persist($artist);
          $artists[] = $artist;
        }

        // fixtures Style
        for ($k = 0; $k < 20; $k++) {
            $style = new Style();
            $style->setName($faker->word())
              ->setCreated(new \Datetime());

              for($j = 0; $j < $faker->numberBetween(1,2); $j++){
                      $style->addArtist($artists[$faker->numberBetween(0, count($artists) - 1)]);
              }
  
      
            $manager->persist($style);
          }

        // fixtures Album
        for ($l = 0; $l < 200; $l++) {
        $album = new Album();
        $album->setName($faker->word())
            ->setReleaseYear(($faker->numberBetween($min = 1980, $max = 2020)))
            ->setCreated(new \DateTime());

            for($m = 0; $m < 1; $m++){
                    $album->setArtist($artists[$faker->numberBetween(0, count($artists) - 1)]);
            }

    
        $manager->persist($album);
        }


        // fixtures User
        $user = new User;
        $user->setEmail('aka@aka.com')
        ->setPassword($this->encoder->encodePassword($user, '1234'))
        ->setFailedAuth(0);
    
        $manager->persist($user);
    
        $manager->flush();
    }
}
