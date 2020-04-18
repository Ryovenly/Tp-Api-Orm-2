<?php
namespace App\Dto;
use Symfony\Component\Serializer\Annotation\Groups;

    /**
     * DTO
     */
final class ArtistOutput{

    /**
     * @Groups("artist_read")
     */
    public $id;

    /**
     * @Groups("artist_read")
     */
    public $name;

    /**
     * @Groups("artist_read")
     */
    public $startYear;
    
    /**
     * @Groups("artist_read")
     */
    public $albumRelease;

    /**
     * @Groups("artist_read")
     */
    public $fanNumber;

    /**
     * @Groups("artist_read")
     */
    public $styles;

}