<?php

namespace App\ValueObjects;

use App\Contracts\ValueObject;
use Carbon\Carbon;

class SliderValueObject implements ValueObject
{
    public function __construct(
        private int|null $id,
        private string $background_image,
        private string|null $slider_image,
        private string $primary_text,
        private string $secondary_text,
        private string|null $description,
        private string|null $url,
        private string|null $link_product,
        private int|null $is_top,
        private Carbon|null $created_at,
        private Carbon|null $updated_at
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'background_image' => $this->background_image,
            'slider_image' => $this->slider_image,
            'primary_text' => $this->primary_text,
            'secondary_text' => $this->secondary_text,
            'description' => $this->description,
            'url' => $this->url,
            'link_product' => $this->link_product,
            'is_top' => $this->is_top,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
