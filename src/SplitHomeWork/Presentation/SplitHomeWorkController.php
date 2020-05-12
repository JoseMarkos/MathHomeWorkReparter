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
            if ($this->isCousin($i)) 
            {
                $this->cousinItems = [...$this->cousinItems, $i];
            }           
        }
    }

    private function setCousinItemsNum() : void {
        $this->setCousinItems();
        $this->cousinItemsNum = count($this->cousinItems);
    }

    private function setextraItemsNum() : void {
        $this->extraItemsNum = $this->cousinItemsNum % $this->students;
    }

    private function getMessage() : string 
    {
        $this->setcousinItemsNum();
        $this->setextraItemsNum();

        if ($this->extraItemsNum < 1) {
            return "Cada estudiante resuelve " . $this->cousinItemsNum / $this->students . " ejercicios.";
        }

        return "Cada estudiante resuelve " . (round($this->cousinItemsNum / $this->students) - (float)0) . " ejercicios. Hay " . $this->extraItemsNum . " de mas.";
    }

    private function getContent() : string
    {
        $counter = 0;

        $content =  $this->getMessage();
        $content .= "</br>";
        $content .= "</br>";
        $content .= "<table border=1>";
        $content .= "	<tr>";
        $content .= "		<td>Marcos</td>";
        $content .= "		<td>Nestor</td>";
        $content .= "		<td>Pablo</td>";
        $content .= "	</tr>";
          
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
            $content .= "</tr>";
        }
    }
    
    private function isCousin(int $num) : bool 
    {
        return boolval($num % 2);
    }
}
