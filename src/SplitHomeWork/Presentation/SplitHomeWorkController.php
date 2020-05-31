<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SocialNews\SplitHomeWork\Presentation\Table;

final class SplitHomeWorkController
{
    private array $students 		= array('Marcos', 'Nestor', 'Pablo');
    private int $items 				= 63;
    private int $itemsTwo 			= 5;
    private array $cousinItems 		= array();
    private array $cousinItemsTwo	= array();

    public function show(Request $request) : Response
    {
        $content = $this->getContent();
        return new Response($content);
    }

    private function setCousinItems(int $minimum = 0) : void {
        for ($i = $this->items; $i > $minimum; $i--)
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
        $this->setCousinItems(5);
        $this->setCousinItemsTwo();

		return Table::GetTable("3.3", $this->cousinItems, $this->students);
        //$content .= Table::GetTable("3.3", $this->cousinItemsTwo, count($this->studentsNames));

        //return $content;
    }
}
