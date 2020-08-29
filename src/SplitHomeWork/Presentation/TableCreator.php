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
        $content =              self::AddStudents($content);
        $content .= "	    </tr>";
		$content .= "	    <tr>";
        $content =              self::AddItems($table, $counter, $content);
        $content .= "       </tr>";
        $content .= "   </tbody>";
        $content .= "</table>";

        $style = self::GetStyle();
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

    /**
     * @param Table $table
     * @param int $counter
     * @param string $content
     * @return string
     */
    private static function AddItems(Table $table, int $counter, string $content): string
    {
        foreach ($table->items() as $item) {
            $counter++;
            $content .= "<td>";
            $content .= $item;
            $content .= "</td>";
            $content .= self::BreakColumn($counter);
        }
        return $content;
    }

    /**
     * @param string $content
     * @return string
     */
    public static function AddStudents(string $content): string
    {
        foreach (self::students as $student) {
            $content .= "		<th>" . $student . "</th>";
        }
        return $content;
    }

    /**
     * @return string
     */
    public static function GetStyle(): string
    {
        return "<style>
        			table, th, td {
                        border: 1px solid black;
                    }
                    th, td {
                        padding: 0.1rem 0.2rem;
                    }
                    h2 {
                        margin-top: 0;
                    }
        		</style>";
    }
}