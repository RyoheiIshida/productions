<?php
// src/Controller/ArticlesController.php

namespace App\Controller;


class LargeAreasController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $large_areas = $this->Paginator->paginate($this->LargeAreas->find("all"));
        $this->set(compact('large_areas'));
    }
    public function view($slug = null)
    {
        $large_areas = $this->LargeAreas->find("all",['contain'=>['Prefectures','Citys']]);
        $this->set(compact('large_areas'));
    }
}
