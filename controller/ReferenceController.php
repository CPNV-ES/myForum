<?php

require_once("model/Reference.php");

class ReferenceController
{
    public function index()
    {
        $references = Reference::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/index.view.php";
    }

    public function show($id)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php";
    }

    public function create() // simply show the creation form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/create.view.php";
    }

    public function store() // handle form creation submit
    {
        $reference = new Reference();
        $reference->description = htmlspecialchars($_GET["description"]);
        $reference->url = htmlspecialchars($_GET["url"]);
        $reference->save();

        if($reference->id != null) {
            array_push($_SESSION["flash_messages"], [
                "text" => "La référence '{$reference->description}' a bien été créé",
                "type" => "info"
            ]);
        }
        else {
            array_push($_SESSION["flash_messages"], [
                "text" => "Erreur lors de la création de la référence '{$reference->description}'",
                "type" => "error"
            ]);
        }
        header("Location: /?controller=reference&action=index");    
    }

    public function edit($id) // simply show the edit form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php"; // back to show after saving changes
    }

    public function destroy($id)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/index.view.php"; // back to index after destroy
    }
}
