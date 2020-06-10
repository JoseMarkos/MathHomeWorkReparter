<?php
declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

final class Table
{
    private string $name;
    private array $items;

    function __construct(string $name, array $items)
    {
        $this->name = $name;
        $this->items = $items;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function items() : array
    {
        return $this->items;
    }
}