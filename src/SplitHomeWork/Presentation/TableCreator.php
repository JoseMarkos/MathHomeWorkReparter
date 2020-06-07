<?php
declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

final class TableCreator
{
    public static function GetTable(Table $table, array $students) : string
    {
        $counter = 0;

        $content = "<h2>" . $table->name() . "</h2>";
        $content .= "<table border=1>";
        $content .= "	<tbody>";
        $content .= "	    <tr>";

		foreach ($students as $student)
		{
			$content .= "		    <th>" . $student ."</th>";
		}

		$content .= "	    </tr>";
		$content .= "	    <tr>";

        foreach ($table->items() as $i)
        {
            $counter++;
            $content .= "<td>";
            $content .= $i;
            $content .= "</td>";
            $content .= self::BreakColumn($counter, count($students));
        }

        $content .= "       </tr>";
        $content .= "   </tbody>";
        $content .= "</table>";
        return $content;
    }

    private static function BreakColumn(int $counter, int $columns) : string
    {
        if ($counter % $columns == 0)
        {
            $content = "</tr>";
            $content .= "<tr>";
            return $content;
        }
        return "";
    }
}