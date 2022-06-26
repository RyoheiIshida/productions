<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class CitysController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $citys = $this->Paginator->paginate($this->Citys->find());
        $this->set(compact('citys'));
    }
    public function view($slug = null)
    {
        $city = $this->Citys->findBySlug($slug)->firstOrFail();
        $this->set(compact('city'));
    }
}
