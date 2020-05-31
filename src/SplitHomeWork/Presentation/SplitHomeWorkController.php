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

    private function getCousinItems(int $minimum = 0) : array {
    	$items = array();

        for ($i = $this->items; $i > $minimum; $i--)
        {
            $items = ($i & 1) ? [...$items, $i] : $items;
        }

        return $items;
    }

    private function getContent() : string
    {
        $items = $this->getCousinItems(1);

        $content =	'<div style="display: grid; justify-content: center;">';
        $content .=		'<div style="padding: 1rem; background: floralwhite;">';
        $content .= 		Table::GetTable("3.3", $items, $this->students);
        $content .=		'</div>';
        $content .= '</div>';
        return  $content;
    }
}
