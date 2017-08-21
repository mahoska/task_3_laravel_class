<?php 
namespace TinyURL\Repository\Link;
interface LinkRepositoryInterface
{
    public function create($url, $user_id);
    public function find($id);

}

