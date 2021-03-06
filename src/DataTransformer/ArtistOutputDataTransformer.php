<?php

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\ArtistOutput;
use App\Entity\Artist;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Validator\Constraints\Length;

final class ArtistOutputDataTransformer implements DataTransformerInterface
{

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $data instanceof Artist && $to === ArtistOutput::class;
    }

        public function transform($object, string $to, array $context = [])
    {
        if (!$object instanceof Artist){
            return;
        }

        $output = new ArtistOutput();

        $output->id = $object->getId();
        $output->name = $object->getName();
        $output->startYear = $object->getStartYear();

        $albums = $object->getAlbums();
        $output->albumRelease = sizeof($albums);

        $users = $object->getUsers();
        $output->fanNumber = sizeof($users);
        $output->styles = $object->getStyles();



        return $output;
    }

}