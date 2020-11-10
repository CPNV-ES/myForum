<?php

require_once "model/Opinion.php";
require_once "model/Opinionstates.php";

class OpinionController
{
    public function index()
    {
        $opinions = Opinion::all();
        $opinionstates = Opinionstates::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/index.view.php";
    }

    public function show($id)
    {

    }

    public function create() // simply show the creation form
    {

    }

    public function store() // handle form creation submit
    {

    }

    public function edit($id) // simply show the edit form
    {

    }

    public function update($id) // handle edit form submit
    {

    }

    public function destroy($id)
    {

    }
}
