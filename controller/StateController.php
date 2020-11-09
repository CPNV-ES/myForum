<?php
require_once("model/State.php");


class StateController
{
    public function index()
    {
        $states = State::all();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/index.view.php";
    }

    public function show($id)
    {
        $state = new State();
        $state->id = $id;
        $state->load();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/show.view.php";
    }

    public function create() // simply show the creation form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/create.view.php";
    }

    public function store() // handle form creation submit
    {
        $state = new State();
        $state->name = htmlspecialchars($_GET["name"]);
        $state->save();

        if($state->id != null) {
            ViewHelpers::pushFlashMessage([
                "text" => "Le rôle '{$state->name}' a bien été créé",
                "type" => "info"
            ]);
        }
        else {
            ViewHelpers::pushFlashMessage([
                "text" => "Erreur lors de la création du rôle '{$state->name}'",
                "type" => "error"
            ]);
        }
        header("Location: /?controller=state&action=index");
    }

    public function edit($id) // simply show the edit form
    {
        $state = new State();
        $state->id = $id;
        $state->load();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        $showErrMsg = function() {
            global $id;
            ViewHelpers::pushFlashMessage([
                "text" => "Erreur lors de la mise à jour du rôle avec l'id '{$id}' ",
                "type" => "error"
            ]);
            header("Location: /?controller=state&action=index");
            return;
        };

        $state = new State();
        $state->id = $id;
        $state->load();

        if($state->id == null || !isset($_GET["name"])) {
            $showErrMsg();
            return;
        }

        $state->name = htmlspecialchars($_GET["name"]);
        $success = $state->update();

        if($success) {
            ViewHelpers::pushFlashMessage([
                "text" => "Le rôle '{$state->name}' a été mis à jour",
                "type" => "info"
            ]);
        }
        else {
            $showErrMsg();
            return;
        }

        header("Location: /?controller=state&action=index");
    }

    public function destroy($id)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/index.view.php"; // back to index after destroy
    }
}
