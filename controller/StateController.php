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
        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/show.view.php"; // back to show after storing new resource
    }

    public function edit($id) // simply show the edit form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/show.view.php"; // back to show after saving changes
    }

    public function destroy($id)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/states/index.view.php"; // back to index after destroy
    }
}
