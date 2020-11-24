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
     * @param int $minimum
     * @param int $maximum
     * @return array
     */
    private function getMultiplyOf(int $minimum = 1, int $maximum = 63, int $base) : array {
    	$items = array();
        
        for ($i = $maximum; $i >= $minimum; $i--)
        {
            $items = !($i % $base) ? [...$items, $i] : $items;
        }
        return $items;
    }

    private function getStrangerThing(int $maximum) : array {
    	$items = [3];
        
        while (end($items) + 4 < $maximum) 
        {
            array_push($items, end($items) + 4);
        }
        return $items;
    }

    /**
     * @return array
     */
    private function getContent() : array
    {
        //$items =  [...$items1, ...$second, ...$items];
        $items34 = self::getStrangerThing(46);
        $table34 = new Table("3.4", $items34);

        $items35 = self::getStrangerThing(32);
        array_shift($items35);
        $table35 = new Table("3.5", $items35);

        $items36 = self::getStrangerThing(34);
        $table36 = new Table("3.6", $items36);

        return  [$table34, $table35, $table36];
    }
}
