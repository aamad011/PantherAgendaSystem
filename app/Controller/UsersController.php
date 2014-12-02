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
        if(AuthComponent::user()){
            $this->Auth->allow('logout','index','add');
        }else{
            $this->Auth->allow('login','index','add');
        }
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
            if(($this->Session->check('locked'))){
                if((time() - $this->Session->read('lastTry')) <= 60) {
                    $this->Session->setFlash("You are locked out for " . floor((time() - ($this->Session->read('lastTry'))) / 60) . " minutes and "
                        . (time() - ($this->Session->read('lastTry')))%60 . " Seconds");
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    $this->Session->delete('attempts');
                    $this->Session->delete('lastTry');
                    $this->Session->delete('locked');
                }
            }
            if ($this->Auth->login()) {
                $this->Session->setFlash("Successful Login, Welcome ".$this->request->data['User']['username'],'default',array(),'good');
                if($this->Session->check('attempts')){
                    $this->Session->delete('attempts');
                    $this->Session->delete('lastTry');
                }
                return $this->redirect($this->Auth->redirectUrl());
            }else if(!$this->Session->check('attempts')){
                $this->Session->write('attempts',2);
                $this->Session->write('lastTry', time());
                $this->Session->setFlash("1 failed attempt");
            }else{
                if($this->Session->read('attempts')==2){
                    $this->Session->write('attempts',1);
                    $this->Session->write('lastTry', time());
                    $this->Session->setFlash("2 failed attempts");

                }else{
                    $this->Session->write('locked','yes');
                    $this->Session->write('lastTry', time());
                }
            }
            //$this->Session->setFlash(__('Invalid username or Password'));
        }
    }
    /**
    Logs out a user.
    return: boolean: True if the user is logged out.
    Needs to set some session variable.
     */
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
 /**
  * Locks out a user.
  * return: boolean: True if the user is locked out.
  * need to increment
  */
    public function lockout(){

    }
}
