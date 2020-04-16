<?php
namespace App\Dto;
use Symfony\Component\Serializer\Annotation\Groups;

    /**
     * DTO
     */
final class AlbumOutput{

    /**
     * @Groups("album_read")
     */
    public $id;

    /**
     * @Groups("album_read")
     */
    public $name;

    /**
     * @Groups("album_read")
     */
    public $releaseYear;
    
    /**
     * @Groups("album_read")
     */
    public $artist;


}