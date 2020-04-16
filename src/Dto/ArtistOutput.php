<?php
namespace App\Dto;
use Symfony\Component\Serializer\Annotation\Groups;

    /**
     * DTO
     */
final class ArtistOutput{

    /**
     * @Groups("artiste_read")
     */
    public $id;

    /**
     * @Groups("artiste_read")
     */
    public $name;

    /**
     * @Groups("artiste_read")
     */
    public $startYear;
    
    /**
     * @Groups("artiste_read")
     */
    public $albumRelease;

    /**
     * @Groups("artiste_read")
     */
    public $fanNumber;

    /**
     * @Groups("artiste_read")
     */
    public $styles;

}