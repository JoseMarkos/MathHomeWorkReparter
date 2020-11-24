<?php declare(strict_types=1);

namespace SocialNews\Framework\Rendering;

use Twig;
use Twig\Loader;

final class TwigTemplateRendererFactory
{
    private $templateDirectory;

    public function __construct(TemplateDirectory $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    public function create(): TwigTemplateRenderer
    {
        $templateDirectory = $this->templateDirectory->toString();
        $loader = new Twig\Loader\FilesystemLoader([$templateDirectory]);
        $twigEnvironment = new Twig\Environment($loader);
        return new TwigTemplateRenderer($twigEnvironment);
    }
}