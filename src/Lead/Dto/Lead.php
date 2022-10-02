<?php

namespace App\Lead\Dto;

class Lead
{
    /** @var int */
    private $id;
    /** @var string */
    private $location;
    /** @var string */
    private $source;

    public function __construct(int $id, string $location, string $source)
    {
        $this->location = $location;
        $this->source = $source;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getSource(): string
    {
        return $this->source;
    }
}
