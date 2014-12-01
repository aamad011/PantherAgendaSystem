<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 11/23/2014
 * Time: 12:06 PM
 * should validate all information passed to it by the controller,
 * then create some entry in the table or whatever
 */
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
    var $name = 'User';
    public $validate = array('username' => array(
        'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'A username is required'
        ), 'alpha' => array(
            'rule' => 'alphaNumeric',
            'required' => true,
            'message' => "Please only use characters 0-9 or a-z"
        )
    ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
            'between' => array(
                'rule' => array('between', 8, 20),
                'message' => 'Password should have between 8 and 20 characters'
            )
        ),
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Name is required'
            ),
            'alpha' => array(
                'rule' => array('custom', '/^[a-zA-z ]{3,45}$/'),
                'required' => true,
                'message' => "Please only use characters a-z, with at least 3 characters"
            )
        )
    );

    public function beforeSave($options = array())
    {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}