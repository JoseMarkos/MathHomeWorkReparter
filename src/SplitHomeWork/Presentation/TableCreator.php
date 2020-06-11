<?php
declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

final class TableCreator
{
	const students = array('Marcos', 'Nestor', 'Pablo');

	/**
	 * @param Table $table
	 *
	 * @return string
	 */
	public static function GetTable(Table $table) : string
    {
        $counter = 0;

        $content = "<h2>" . $table->name() . "</h2>";
        $content .= "<table>";
        $content .= "	<tbody>";
        $content .= "	    <tr>";

		foreach (self::students as $student)
		{
			$content .= "		<th>" . $student ."</th>";
		}

		$content .= "	    </tr>";
		$content .= "	    <tr>";

        foreach ($table->items() as $item)
        {
            $counter++;
            $content .= 		"<td>";
            $content .= 			$item;
            $content .= 		"</td>";
            $content .= 	self::BreakColumn($counter);
        }

        $content .= "       </tr>";
        $content .= "   </tbody>";
        $content .= "</table>";

        $style = "<style>
        			table, th, td {
  						border: 1px solid black;
					}
        		</style>";
        return $content . $style;
    }

	/**
	 * @param int $counter
	 *
	 * @return string
	 */
	private static function BreakColumn(int $counter) : string
    {
        if ($counter % count(self::students) == 0)
        {
            $content = "</tr>";
            $content .= "<tr>";
            return $content;
        }
        return "";
    }
}