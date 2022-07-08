<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class CitiesController extends AppController
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
        $cities = $this->Paginator->paginate($this->Cities->find());
        $this->set(compact('cities'));
    }
    public function view($slug = null)
    {
        $city = $this->Cities->findBySlug($slug)->firstOrFail();
        $this->set(compact('city'));
    }
}
