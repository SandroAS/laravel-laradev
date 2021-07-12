<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 2019-02-28
 * Time: 11:15
 */

namespace LaraDev\Support;


use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    private $optimizer;

    public function __construct()
    {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
            'Laravel',
            'pt_BR',
            'article'
        )->twitterCard(
            '@guuweb',
            '@guuweb',
            'http://127.0.0.1:8000'
        )->publisher(
            'upinside',
            'guhweb',
            '107305124528362639842',
            '108766778915138317333'
        )->facebook(
            '626590460695980'
        );
    }

    public function render(string $title, string $description, string $url, string $image, bool $follow = true)
    {
        return $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
    }
}