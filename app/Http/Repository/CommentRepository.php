<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ICommentRepository;
use App\Models\Comment;

class CommentRepository extends BaseRepository implements ICommentRepository
{

    public function model()
    {
        return Comment::class;
    }

}
