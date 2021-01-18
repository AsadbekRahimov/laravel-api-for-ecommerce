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

    public function __construct()
    {
        $this->meta="";
        $this->title="Home Page";
    }


}
