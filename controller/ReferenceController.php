<?php

include "model/Reference.php";

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
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/create.view.php";
    }

    public function store() // handle form creation submit
    {
        $ref = new Reference();
        $ref->description = $_POST['description'];
        $ref->url = $_POST['url'];
        $ref->save();
        $_SESSION['flashMessage'] = "La référence ".$ref->description." a été créée correctement";
        header("Location: /?controller=Reference&action=index");
       // require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php"; // back to show after storing new resource
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
        Reference::update($id,$_POST['description'],$_POST['url']);
        $reference = new Reference();
        $reference->id = $id;
        $reference->load();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php"; // back to show after saving changes
    }

    public function destroy($id)
    {
        Reference::delete($id);
        $references = Reference::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/index.view.php"; // back to index after destroy
    }
}
