<?php
// src/Controller/ArticlesController.php

namespace App\Controller;


class PrefecturesController extends AppController
{
    public $helpers = ['Paginator' => ['templates' => 'paginator-templates']];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function index()
    {
        $prefectures = $this->Paginator->paginate($this->Prefectures->find("all", ['contain' => ['LargeAreas']]));
        #$prefectures = $this->Prefectures->find("all", ['contain' => ['LargeAreas']]);
        $this->set(compact('prefectures'));
    }
    public function view($slug = null)
    {
        $prefectures = $this->Prefectures->get($slug, ['contain' => ['LargeAreas', 'Citys']]);
        #$prefectures = $this->Paginator->paginate($this->Prefectures->find($slug, ['contain' => ['LargeAreas', 'Citys']]));
        $this->set(compact('prefectures'));
    }
}
