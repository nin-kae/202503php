<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    // The number of items to be dispalay per page.
    //
    // @var int|null
    //
    public ?int $perpage = null;

    // construct of the Controller class.
    //
    public function __construct()
    {
        $this->perpage = config('app.per_page, 5');
    }
}
