<?php

declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SocialNews\SplitHomeWork\Presentation\Table;

final class SplitHomeWorkController
{
    private array $students 		= array('Marcos', 'Nestor', 'Pablo');

    public function show(Request $request) : Response
    {
        $content = $this->getContent();
        return new Response($content);
    }

    private function getCousinItems(int $minimum = 0, int $maximum = 63) : array {
    	$items = array();

        for ($i = $maximum; $i > $minimum; $i--)
        {
            $items = ($i & 1) ? [...$items, $i] : $items;
        }

        return $items;
    }

    private function getContent() : string
    {
        $items = $this->getCousinItems(5);
        $items2 = $this->getCousinItems(15, 30);

        $content =	'<div style="display: grid; justify-content: center;">';
        $content .=		'<div style="padding: 1rem; background: floralwhite;">';
        $content .= 		Table::GetTable("3.3", $items, $this->students);
        $content .= 		Table::GetTable("3.2", $items2, $this->students);
        $content .=		'</div>';
        $content .= '</div>';
        return  $content;
    }
}
