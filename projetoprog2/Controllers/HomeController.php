<?php

class HomeController extends RenderView{
    public function index(){
        $this->loadView('/homepage', [
            'titulo' => "RecapPro - Início"
        ]);
    }
}