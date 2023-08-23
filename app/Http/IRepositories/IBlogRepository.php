<?php


namespace App\Http\IRepositories;


interface IBlogRepository
{
    public function editBlog($id);
    public function updateBlog($input,$id);


}
