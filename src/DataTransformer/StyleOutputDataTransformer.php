<?php

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\StyleOutput;
use App\Entity\Style;
use Symfony\Component\Validator\Constraints\Length;

final class StyleOutputDataTransformer implements DataTransformerInterface
{

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $data instanceof Style && $to === StyleOutput::class;
    }

        public function transform($object, string $to, array $context = [])
    {
        if (!$object instanceof Style){
            return;
        }

        $output = new StyleOutput();

        $output->id = $object->getId();
        $output->name = $object->getName();

        return $output;
    }

}