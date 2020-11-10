<?php

require_once "model/Opinion.php";

class OpinionController
{
    public function index()
    {
        $opinions = Opinion::all();
        $opinionstates = Opinion::allOpinionState();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/index.view.php";
    }

    public function show($id)
    {
        $opinion = new Opinion();
        $opinion->id = $id;
        $opinion->load();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/show.view.php";
    }

    public function create() // simply show the creation form
    {
        $opinion = new Opinion();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/create.view.php";
    }

    public function store() // handle form creation submit
    {
        $opinion = new Opinion();
        $opinion->description = $_POST['description'];
        $opinion->url = $_POST['url'];
        $opinion->save();
        ViewHelpers::setFlashMessage("Nouvelle opinions créée");
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/show.view.php";
    }

    public function edit($id) // simply show the edit form
    {
        $opinion = new Opinion();
        $opinion->id = $id;
        $opinion->load();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        $opinion = new Opinion();
        $opinion->id = $id;
        $opinion->load();
        $opinion->description = $_POST['description'];
        $opinion->url = $_POST['url'];
        $opinion->update();
        ViewHelpers::setFlashMessage("opinions modifiée");
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/show.view.php";
    }

    public function destroy($id)
    {
        $opinion = new Opinion();
        $opinion->id = $id;
        $opinion->delete();
        ViewHelpers::setFlashMessage("opinions supprimée");
        $this->index();
    }
}
