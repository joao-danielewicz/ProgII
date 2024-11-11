<?php
class UserController extends RenderView{
    public function index(){
        $this->loadView('/UsuarioView',
        [
            'title' => 'Login'
        ]);
    }
    public function show($id){
        echo "Usuário ".$id[0];
    }
}