<?php
namespace TinyURL\Repository\Link;


class DbLinkRepository implements LinkRepositoryInterface
{
    protected $_model;

    public function __construct($model)
    {
        $this->_model = $model;
    }


    public function create($url, $user_id)
    {
       $link = $this->_model;
       $link->url = $url;
       $link->user_id = $user_id; 
       $link->save();
       return $link->id;
    }

    public function find($id)
    {
        $link = $this->_model->find($id);
        if (!$link)
        {
            return null;
        }

        return $link->url;

    }
}

