<?php
declare(strict_types=1);

namespace SocialNews\SplitHomeWork\Presentation;

use SocialNews\Framework\Rendering;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SplitHomeWorkController
{
    private $templateRender;
    const students = array('Marcos', 'Nestor', 'Pablo');

    public function __construct(Rendering\TemplateRenderer $templateRender)
    {
        $this->templateRender = $templateRender;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function show(Request $request) : Response
    {
       $content = $this->templateRender->render('Tables.html.twig', [
           'tables' => $this->getContent(),
           'students' => self::students,
       ]); 
       return new Response($content);
    }

    /**
     * @param int $minimum
     * @param int $maximum
     * @return array
     */
    private function getCousinItems(int $minimum = 1, int $maximum = 63) : array {
    	$items = array();
        
        for ($i = $maximum; $i >= $minimum; $i--)
        {
            $items = ($i & 1) ? [...$items, $i] : $items;
        }
        return $items;
    }

    /**
     * @return array
     */
    private function getContent() : array
    {
        //$items =  [...$items1, ...$second, ...$items];
       
        $items    = $this->getCousinItems(1, 82);
        $table    = new Table("5.4", $items);
        
        $items2    = $this->getCousinItems(1, 15);
        $table2    = new Table("5.5", $items2);
        return  [$table, $table2];
    }
}
