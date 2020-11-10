<?php

require_once "model/Reference.php";

class ReferenceController
{
    public function index()
    {
        $references = Reference::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/index.view.php";
    }

    public function show($id)
    {
        $reference = new Reference();
        $reference->id = $id;
        $reference->load();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php";
    }

    public function create() // simply show the creation form
    {
        $reference = new Reference();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/create.view.php";
    }

    public function store() // handle form creation submit
    {
        $reference = new Reference();
        $reference->description = $_POST['description'];
        $reference->url = $_POST['url'];
        $reference->save();
        ViewHelpers::setFlashMessage("Nouvelle référence créée");
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php";
    }

    public function edit($id) // simply show the edit form
    {
        $reference = new Reference();
        $reference->id = $id;
        $reference->load();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        $reference = new Reference();
        $reference->id = $id;
        $reference->load();
        $reference->description = $_POST['description'];
        $reference->url = $_POST['url'];
        $reference->update();
        ViewHelpers::setFlashMessage("Référence modifiée");
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php";
    }

    public function destroy($id)
    {
        $reference = new Reference();
        $reference->id = $id;
        $reference->delete();
        ViewHelpers::setFlashMessage("Référence supprimée");
        $this->index();
    }
}
