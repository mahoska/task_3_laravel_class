<?php

use TinyURL\Repository\Link\LinkRepositoryInterface;
use TinyURL\Repository\Registration\RegistrRepositoryInterface;

class IndexController extends BaseController
{
    protected $linkRepo;

        

    public function __construct(LinkRepositoryInterface $linkRepo, RegistrRepositoryInterface $userRepo)
    {
        $this->linkRepo = $linkRepo;
        $this->beforeFilter('auth');
        $this->userRepo = $userRepo;
       
    }

    public function  showIndex()
    {
        
        if( Auth::id())
        {
            $user_id = Auth::id();
            $name = $this->userRepo->find($user_id);
            return View::make('index.index',array('userName'=>$name ));
        }
        
        return View::make('auth.login');

    }   

    public function postUrl()
    {
        Input::flash();
        $url = Input::get('url');
        $rules =array('url' => 'required|url');
        $validator = Validator::make(array('url'=> $url), $rules);
        if ($validator->fails())
        {
            return Redirect::to('/')->withErrors($validator);
        }
        $user_id = Auth::id();
        $id = $this->linkRepo->create($url,$user_id);
        
        $name = $this->userRepo->find($user_id);
        
        $shortUrl = URL::to('/', array($id));
        return View::make('index.link',array('link' => $shortUrl,'userName'=>$name )); 

    }

    public function getRedirect($id)
    {
        $url = $this->linkRepo->find($id);
        if (!$url)
        {
            $url = '/';
        }
        return Redirect::to($url);

    }





}

