<?php

require('model/Theme.php');

class ThemeController
{
    private $theme;
    public function __construct()
    {
        $this->theme = new Theme();
    }

    public function index()
    {
        $themes = Theme::all(); 
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/index.view.php";
    }

    public function show($id)
    {
        $theme = new theme();
        $theme->id = $id;
        $theme->load();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/show.view.php";
    }

    public function create() // simply show the creation form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/create.view.php";
    }

    public function store() // handle form creation submit
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/show.view.php"; // back to show after storing new resource
    }

    public function edit($id) // simply show the edit form
    {
        $theme = new theme();
        $theme->id = $id;
        $theme->load();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        $showErrMsg = function() {
            global $id;
            ViewHelpers::pushFlashMessage([
                "text" => "Erreur lors de la mise à jour de la référence avec l'id '{$id}' ",
                "type" => "error"
            ]);
            header("Location: /?controller=theme&action=index");
            return;
        };

        $theme = new theme();
        $theme->id = $id;
        $theme->load();

        if($theme->id == null || !isset($_GET["name"])) {
            $showErrMsg();
            return;
        }

        $theme->name = htmlspecialchars($_GET["name"]);
        $success = $theme->update();

        if($success) {
            ViewHelpers::pushFlashMessage([
                "text" => "La référence '{$theme->name}' a été mise à jour",
                "type" => "info"
            ]);
        }
        else {
            $showErrMsg();
            return;
        }

        header("Location: /?controller=theme&action=index");
    }

    public function destroy($id)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/index.view.php"; // back to index after destroy
    }
}
