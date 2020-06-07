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

    public function name()
    {
        return $this->name;
    }

    public function items()
    {
        return $this->items;
    }
}