<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SplitHomeWorkController 
{
    private int $students = 3;
    private int $items = 35;
    private array $cousinItems = array();
    private int $cousinItemsNum;
    private float $extraItemsNum;

    public function show(Request $request) : Response
    {
        $content = $this->getContent();
        return new Response($content);
    }

    private function setCousinItems() : void {
        for ($i = $this->items; $i > 0; $i--)
        {
            $this->cousinItems = ($i & 1) ? [...$this->cousinItems, $i] : $this->cousinItems;
        }
    }

    private function setCousinItemsNum() : void {
        $this->setCousinItems();
        $this->cousinItemsNum = count($this->cousinItems);
    }

    private function setextraItemsNum() : void {
        $this->extraItemsNum = $this->cousinItemsNum % $this->students;
    }

    private function getContent() : string
    {
        $counter = 0;

        $content .= "</br>";
        $content .= "<table border=1>";
        $content .= "	<tr>";
        $content .= "		<th>Marcos</th>";
        $content .= "		<th>Nestor</th>";
        $content .= "		<th>Pablo</th>";
        $content .= "	</tr>";
        $content .= "	<tr>";
          
        foreach ($this->cousinItems as $i) 
        {
            $content .= "<td>";
            $content .= $i;
            $content .= "</td>";
            $counter++;
            
            $this->breakColumn($counter, $content);
        }

        $content .= "</tr>";
        $content .= "</table>";

        return $content;
    }

    private function breakColumn(int $num, string &$content) : void 
    {
        if ($num % $this->students == 0)
        {
            $content .= "</tr>";
            $content .= "<tr>";
        }
    }
}
