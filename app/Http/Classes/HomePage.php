<?php

namespace App\Http\Classes;

class HomePage extends Page
{
    /** @var  homePage */
    protected $homePage;
    /**
     * Vars
     *
     * @var string
     * @var string
     */
    public $title;
    public $meta;

    public function __construct(Page $homePage)
    {
        $homePage->meta="";
        $homePage->title="Home Page";
        $this->homePage = $homePage;
    }


}
