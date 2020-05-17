<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

final class Table 
{
    public static function GetTable(string $name, array $items, int $columns) : string
    {   
        $counter = 0;

        $content = "</br>";
        $content .= "<h2>" . $name . "</h2>";
        $content .= "<table border=1>";
        $content .= "	<tbody>";
        $content .= "	    <tr>";
        $content .= "		    <th>Marcos</th>";
        $content .= "		    <th>Nestor</th>";
        $content .= "		    <th>Pablo</th>";
        $content .= "	    </tr>";
        $content .= "	    <tr>";

        foreach ($items as $i) 
        {
            $content .= "<td>";
            $content .= $i;
            $content .= "</td>";
            $counter++;
            
            self::BreakColumn($counter, $content, $columns);
        }

        $content .= "       </tr>";
        $content .= "   </tbody>";
        $content .= "</table>";
        
        return $content;
    }

    private function BreakColumn(int $num, string &$content, int $columns) : void 
    {
        if ($num % $columns == 0)
        {
            $content .= "</tr>";
            $content .= "<tr>";
        }
    }
}