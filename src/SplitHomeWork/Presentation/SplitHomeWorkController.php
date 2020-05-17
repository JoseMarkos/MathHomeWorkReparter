<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SocialNews\SplitHomeWork\Presentation\Table;

final class SplitHomeWorkController 
{
    private array $studentsNames = array('Marcos', 'Nestor', 'Pablo');
    private int $items = 73;
    private int $itemsTwo = 5;
    private array $cousinItems = array();
    private array $cousinItemsTwo = array();

    public function show(Request $request) : Response
    {
        $content = $this->getContent();
        return new Response($content);
    }

    private function setCousinItems() : void {
        for ($i = $this->items; $i > 35; $i--)
        {
            $this->cousinItems = ($i & 1) ? [...$this->cousinItems, $i] : $this->cousinItems;
        }
    }

    private function setCousinItemsTwo() : void {
        for ($i = $this->itemsTwo; $i > 0; $i--)
        {
            $this->cousinItemsTwo = ($i & 1) ? [...$this->cousinItemsTwo, $i] : $this->cousinItemsTwo;
        }
    }

    private function getContent() : string
    {
        $this->setCousinItems();
        $this->setCousinItemsTwo();
        
        $content = Table::GetTable("3.2", $this->cousinItems, count($this->studentsNames));
        $content .= Table::GetTable("3.3", $this->cousinItemsTwo, count($this->studentsNames));

        return $content;
    }
}
