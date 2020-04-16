<?php
namespace App\Dto;
use Symfony\Component\Serializer\Annotation\Groups;

    /**
     * DTO
     */
final class StyleOutput{

    /**
     * @Groups("style_read")
     */
    public $id;

    /**
     * @Groups("style_read")
     */
    public $name;



}