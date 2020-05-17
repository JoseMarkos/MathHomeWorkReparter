<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SplitHomeWorkController 
{
    private int $students = 3;
    private int $items = 73;
    private int $itemsTwo = 5;
    private array $cousinItems = array();
    private array $cousinItemsTwo = array();
    private int $cousinItemsNum;
    private int $cousinItemsNumTwo;
    private float $extraItemsNum;

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

    private function setCousinItemsNum() : void {
        $this->setCousinItems();
        $this->setCousinItemsTwo();
        $this->cousinItemsNum = count($this->cousinItems);
        $this->cousinItemsNumTwo = count($this->cousinItemsTwo);
    }

    private function setextraItemsNum() : void {
        $this->extraItemsNum = $this->cousinItemsNum % $this->students;
    }

    private function getContent() : string
    {
        $counter = 0;

        $content .= "</br>";
        $content .= "</br>3.2";
        $content .= "<table border=1>";
        $content .= "	<tbody>";
        $content .= "	    <tr>";
        $content .= "		    <th>Marcos</th>";
        $content .= "		    <th>Nestor</th>";
        $content .= "		    <th>Pablo</th>";
        $content .= "	    </tr>";
        $content .= "	    <tr>";
          
        foreach ($this->cousinItems as $i) 
        {
            $content .= "<td>";
            $content .= $i;
            $content .= "</td>";
            $counter++;
            
            $this->breakColumn($counter, $content);
        }

        $content .= "       </tr>";
        $content .= "   </tbody>";
        $content .= "</table>";

        $content .= "</br>";
        $content .= "</br>3.3";
        $content .= "<table border=1>";
        $content .= "	<tbody>";
        $content .= "	    <tr>";
        $content .= "		    <th>Marcos</th>";
        $content .= "		    <th>Nestor</th>";
        $content .= "		    <th>Pablo</th>";
        $content .= "	    </tr>";
        $content .= "	    <tr>";
        
        $counter = 0;
        foreach ($this->cousinItemsTwo as $i) 
        {
            $content .= "<td>";
            $content .= $i;
            $content .= "</td>";
            $counter++;
            
            $this->breakColumn($counter, $content);
        }

        $content .= "       </tr>";
        $content .= "   </tbody>";

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
