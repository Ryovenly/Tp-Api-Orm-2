<?php

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\AlbumOutput;
use App\Entity\Album;
use Symfony\Component\Validator\Constraints\Length;

final class AlbumOutputDataTransformer implements DataTransformerInterface
{

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $data instanceof Album && $to === AlbumOutput::class;
    }

        public function transform($object, string $to, array $context = [])
    {
        if (!$object instanceof Album){
            return;
        }

        $output = new AlbumOutput();

        $output->id = $object->getId();
        $output->name = $object->getName();
        $output->releaseYear = $object->getReleaseYear();
        $output->artist = $object->getArtist();


        return $output;
    }

}