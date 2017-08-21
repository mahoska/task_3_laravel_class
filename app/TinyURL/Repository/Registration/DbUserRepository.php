<?php
namespace TinyURL\Repository\Registration;

class DbUserRepository implements RegistrRepositoryInterface
{
    protected $_model;

    public function __construct($model)
    {
        $this->_model = $model;
    }

    
    public function register($data) {
        $user = $this->_model;
        $user->fill($data);
        $user->password = \Hash::make($user->password);
        $user->save();

        return $user->name;
    }
    

    public function find($id)
    {
        $user = $this->_model->find($id);
        if (!$user)
        {
            return null;
        }
        return $user->name;

    }
//    
//    public function delete($id)
//    {
//        $user = $this->_model->find($id);
//        if (!$user)
//        {
//            return false;
//        }
//        $user->delete();
//        return true;
//    }
//    
//     public function update($id, $pole, $value){
//         $user = $this->_model->find($id);
//         $user->$pole = $value;
//     }
}

