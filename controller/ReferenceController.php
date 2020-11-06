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
        $reference = new Reference();
        $reference->id = $id;
        $reference->load();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        $showErrMsg = function() {
            global $id;
            array_push($_SESSION["flash_messages"], [
                "text" => "Erreur lors de la mise à jour de la référence avec l'id '{$id}' ",
                "type" => "error"
            ]);
            header("Location: /?controller=reference&action=index");
            return;
        };

        $reference = new Reference();
        $reference->id = $id;
        $reference->load();

        if($reference->id == null || !isset($_GET["description"]) || !isset($_GET["url"])) {
            $showErrMsg();
            return;
        }

        $reference->description = htmlspecialchars($_GET["description"]);
        $reference->url = htmlspecialchars($_GET["url"]);
        $success = $reference->update();

        if($success) {
            array_push($_SESSION["flash_messages"], [
                "text" => "La référence '{$reference->description}' a été mise à jour",
                "type" => "info"
            ]);
        }
        else {
            $showErrMsg();
            return;
        }

        header("Location: /?controller=reference&action=index");
    }

    public function destroy($id)
    {
        $reference = new Reference();
        $reference->id = $id;
        $reference->load();
        $reference_desc = $reference->description;

        if($reference->id == null) {
            array_push($_SESSION["flash_messages"], [
                "text" => "Erreur lors de la suppression de la référence avec l'id '{$id}' ",
                "type" => "error"
            ]);
            header("Location: /?controller=reference&action=index");
            return;
        }

        $reference->delete();

        array_push($_SESSION["flash_messages"], [
            "text" => "La référence '{$reference_desc}' a été supprimée avec succès",
            "type" => "info"
        ]);

        header("Location: /?controller=reference&action=index");    
    }
}
