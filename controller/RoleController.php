<?php

require_once("model/Role.php");

class RoleController
{
    public function index()
    {
        $roles = Role::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/index.view.php";
    }

    public function show($id)
    {
        $role = new Role();
        $role->id = $id;
        $role->load();
        
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/show.view.php";
    }

    public function create() // simply show the creation form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/create.view.php";
    }

    public function store() // handle form creation submit
    {
        $role = new Role();
        $role->name = htmlspecialchars($_GET["name"]);
        $role->save();

        if($role->id != null) {
            ViewHelpers::pushFlashMessage([
                "text" => "Le rôle '{$role->name}' a bien été créé",
                "type" => "info"
            ]);
        }
        else {
            ViewHelpers::pushFlashMessage([
                "text" => "Erreur lors de la création du rôle '{$role->name}'",
                "type" => "error"
            ]);
        }
        header("Location: /?controller=role&action=index");
    }

    public function edit($id) // simply show the edit form
    {
        $role = new Role();
        $role->id = $id;
        $role->load();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        $showErrMsg = function() {
            global $id;
            ViewHelpers::pushFlashMessage([
                "text" => "Erreur lors de la mise à jour du rôle avec l'id '{$id}' ",
                "type" => "error"
            ]);
            header("Location: /?controller=role&action=index");
            return;
        };

        $role = new Role();
        $role->id = $id;
        $role->load();

        if($role->id == null || !isset($_GET["name"])) {
            $showErrMsg();
            return;
        }

        $role->name = htmlspecialchars($_GET["name"]);
        $success = $role->update();

        if($success) {
            ViewHelpers::pushFlashMessage([
                "text" => "Le rôle '{$role->name}' a été mis à jour",
                "type" => "info"
            ]);
        }
        else {
            $showErrMsg();
            return;
        }

        header("Location: /?controller=role&action=index");
    }

    public function destroy($id)
    {
        $role = new Role();
        $role->id = $id;
        $role->load();
        $role_name = $role->name;

        if($role->id == null) {
            ViewHelpers::pushFlashMessage([
                "text" => "Erreur lors de la suppression du rôle avec l'id '{$id}' ",
                "type" => "error"
            ]);
            header("Location: /?controller=role&action=index");
            return;
        }

        $role->delete();

        ViewHelpers::pushFlashMessage([
            "text" => "Le rôle '{$role_name}' a été supprimé avec succès",
            "type" => "info"
        ]);

        header("Location: /?controller=role&action=index");
    }
}
