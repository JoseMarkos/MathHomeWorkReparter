<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SplitHomeWorkController 
{
    private int $students = 3;
    private int $items = 35;
    private int $result;
    private float $diff;

    public function show(Request $request) : Response
    {
        $content = $this->getContent();
        return new Response($content);
    }

    public function getResults() : int {
        $counter = 0;

        for ($i = $this->items; $i > 0; $i--) 
        {
            if (self::isCousin($i)) 
            {
                $counter++;
            }           
        }

        return $counter;
    }
    
    public function setDiff() : void {
        $this->diff = $this->result % $this->students;
    }


    private function getMessage() : string 
    {
        $this->result = $this::getResults();
        $this->setDiff();

        if ($this->diff < 1) {
            return "Cada estudiante resuelve " . $this->result / $this->students . " ejercicios.";
        }

        return "Cada estudiante resuelve " . (round($this->result / $this->students) - (float)0) . " ejercicios. Hay " . $this->diff . " de mas.";
    }

    private function getContent() : string
    {
        $counter = 0;

        $content =  $this->getMessage();
        $content .= "</br>";
        $content .= "</br>";
        $content .= "<table border=1>";
        $content .= "	<tr>";
        $content .= "		<td>Marcos";
        $content .= "		</td>";
        $content .= "		<td>Nestor";
        $content .= "		</td>";
    	$content .= "		<td>Pablo";
        $content .= "		</td>";
        $content .= "	</tr>";
          
        for ($i = $this->items; $i > 0; $i--) 
        {
            if ($this->isCousin($i)) 
            {
                $content .= "<td>";
                $content .= $i;
                $content .= "</td>";
                $counter++;
            }           

            if ($counter % $this->students == 0)
            {
                $content .= "</tr>";
                $content .= "</tr>";
            }
        }
        
        $content .= "</tr>";
        $content .= "</table>";

        return $content;
    }

    private function isCousin(int $num) : bool {
        return boolval($num % 2);
    }
}
