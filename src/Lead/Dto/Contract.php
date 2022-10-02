<?php

namespace App\Lead\Dto;

class Contract
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var array */
    private $locations;
    /** @var array */
    private $sources;

    public function __construct(int $id, string $title, array $locations, array $sources)
    {
        $this->id = $id;
        $this->title = $title;
        $this->locations = $locations;
        $this->sources = $sources;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLocations(): array
    {
        return $this->locations;
    }

    public function getSources(): array
    {
        return $this->sources;
    }
}
