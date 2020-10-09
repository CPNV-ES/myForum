<?php
require_once 'db/db.php';
class Theme
{

    public $id;
    public $name;

    public function save()
    {
        $query = "INSERT INTO themes  VALUES (id,'$this->name')";
        $this->id = Db::Insert($query);
    }

    public function load()
    {
        $query = "SELECT id,name FROM themes where id = '$this->id'";
        $results = Db::selectOneRecord($query);
        if ($results) {
            $this->id = $results['id'];
            $this->name = $results['name'];
        }else{
            $this->id = NULL;
        }
    }

    public function update()
    {
        $query = "UPDATE themes SET name = '$this->name' WHERE id ='$this->id'";
        Db::Update($query);
    }

    public function delete()
    {
        $query = "DELETE FROM themes WHERE name='$this->name' AND id = '$this->id'";
        Db::Delete($query);
    }
}
