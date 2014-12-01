<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 11/23/2014
 * Time: 12:15 PM
 */
App::uses('AppController','Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class UsersController extends AppController{
    public $helpers = array('Html', 'Form');
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow(array('add','login','index','logout',''));
    }
    public function index()
    {
        $this->set('users', $this->User->find('all'));
    }
    /**
     * Adds a new user to the system.
     * return: boolean: True if the user is added.
     * Add user to database
     */
    public function add(){
        if($this->request->is('post')){
            $this->User->create();
                if($this->User->save($this->request->data)){
                    $this->Session->setFlash(__("User ".$this->request->data['User']['name']." Created Successfully\n"));
                    return $this->redirect(array('action' => 'index'));
                }
            }
    }
    /**
     * Logs in a user.
     * return: boolean: True if the user is logged in.
     * validate then set session variable
     */
    public function login(){
        if ($this->request->is('post')) {
            $passwordHasher = new BlowfishPasswordHasher();
            $pass = ($this->request->data['User']['password']);
            $pass = $passwordHasher->hash($pass);
            if ($this->Auth->login(array('username' => $this->request->data['User']['username'],'password'=>$pass))) {
                $this->Session->setFlash("Successful Login, Welcome ".$this->request->data['User']['username']);
                return $this->redirect(array('controller'=>'Users','action'=>'index'));
            }
            $this->Session->setFlash(__('Password Entered:'.$this->request->data['User']['password']));
        }
    }
    /**
    Logs out a user.
    return: boolean: True if the user is logged out.
    Needs to set some session variable.
     */
    public function logout(){

    }
 /**
  * Locks out a user.
  * return: boolean: True if the user is locked out.
  * need to increment
  */
    public function lockout(){

    }
}
