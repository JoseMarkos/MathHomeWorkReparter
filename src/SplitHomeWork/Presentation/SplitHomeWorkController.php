<?php
declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SplitHomeWorkController
{
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
        $items = $this->getCousinItems(0, 31);
        $table = new Table("3.4", $items);
        $content =	'<div style="display: grid; justify-content: center;">';
        $content .=		'<div style="padding: 1rem; background: floralwhite;">';
        $content .= 		TableCreator::GetTable($table);
        $content .=		'</div>';
        $content .= '</div>';
        return  $content;
    }
}
