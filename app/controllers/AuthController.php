<?php

use TinyURL\Repository\Registration\RegistrRepositoryInterface;

class AuthController extends BaseController
{
    
    protected $userRepo;
        
    public function __construct(RegistrRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
        //$this->beforeFilter('register');
    }
    

    public function getLogin()
    {
        //var_dump(Session::all());
        
        //if(Auth::viaRemember()) //doesn't work
        //if(Session::has('_token')) //work
        
        if(Auth::id()){
            return Redirect::to('/');
        }
        
        return View::make('auth.login');
    }

    public function postLogin()
    {
     
        Input::flashExcept('password');
                
        $data = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
            );
        
        //validation variant 1
        $rules = array(
            'email' => 'required|email|exists:users,email',
            'password'=> 'required|alpha-dash|min:6',
        );

        $validator = Validator::make($data, $rules);
        
        $name = "";
        if (!($validator->fails()) &&  Auth::attempt($data, true))
        {
            //$name = $this->userRepo->find(Auth::id());
            return Redirect::intended('/');//->with('userName', $name);
            //return View::make('index.index')->with('userName', $name);
        }
       
        return Redirect::to('auth/login')->withErrors($validator);
        
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    
    public function getRegister() 
    {
        if(Auth::id()){
            return Redirect::to('/');
        }
        
        return View::make('auth.register');
    }
    
    public function postRegister() 
   {
        
    //validation variant 2
    $rules = User::$validation;
    $data = Input::all();
    //var_dump($data);
    $validation = Validator::make($data, $rules);
    if ($validation->fails()) {
        // In the case of failure, redirecting back with errors and the data itself entered
        return Redirect::to('auth/register')->withErrors($validation)->withInput();
    }
    
    $name = "";
    // Сама регистрация с уже проверенными данными
    $name = $this->userRepo->register($data);
    
    if(Auth::attempt(array('email'=>$data['email'],'password'=>$data['password']), true))
    {
        return Redirect::to('/'); 
    }
    
    return Redirect::to('auth/register'); 
}


}

