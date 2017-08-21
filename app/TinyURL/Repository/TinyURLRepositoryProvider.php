<?php
namespace TinyURL\Repository;
use illuminate\Support\ServiceProvider;

class TinyURLRepositoryProvider extends ServiceProvider
{
    public function register()
    {
        //link
        $this->app->bind('TinyURL\Repository\Link\DbLinkRepository', function(){
                return new \TinyURL\Repository\Link\DbLinkRepository(new \Link);
        });
        
        $this->app->bind('\TinyURL\Repository\Link\LinkRepositoryInterface', '\TinyURL\Repository\Link\ShortLinkRepository');
        
        //user
        $this->app->bind('TinyURL\Repository\Registration\RegistrRepositoryInterface', function(){
                return new \TinyURL\Repository\Registration\DbUserRepository(new \User);
        });
        
        
        

    }

}

