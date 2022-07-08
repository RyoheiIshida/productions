<?php
// src/Controller/ArticlesController.php

namespace App\Controller;


class LargeAreasController extends AppController
{
    public $helpers = ['Paginator' => ['templates' => 'paginator-templates']];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function index()
    {
        $this->loadComponent('Paginator');
        $large_areas = $this->Paginator->paginate($this->LargeAreas->find("all"));
        $this->set(compact('large_areas'));
    }
}
