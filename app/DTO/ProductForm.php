<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProductForm extends DataTransferObject
{
    public string $title;

    public string $description;

    public int $price;

    public ?int $category_id;

    public ?int $in_stock;

    public ?string $image;
}
