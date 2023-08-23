<?php


namespace App\Http\IRepositories;


interface IHomeworkRepository
{

    public function getAllHomework($input);
    public function createHomework();
    public function storeHomework($input);
    public function showHomework($id);
    public function editHomework($id);
    public function updateHomework($input,$id);
    public function deleteHomework($id);

}
