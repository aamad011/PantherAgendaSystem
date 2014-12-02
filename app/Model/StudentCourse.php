<?php
class StudentCourse extends AppModel{
    //$this->set('studentcourses',  $this->StudentCourse->find('list', array('conditions'=>array('StudentCourse.courseid = ' => '1'))));
    public $validate = array(
        'courseid' => array(
              'rule' => 'numeric',
              'message' => 'Only Numbers are allowed.'
        ),
        'grade'=> array(
            'rule' => 'numeric',
            'message' => 'Only Numbers are allowed'
        ),
        'username' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Only Letters and Numbers are allowed.'
            ),
            'between' => array(
                'rule' => array('between', 6, 8),
                'message' => 'Character Limit is 6 to 8 characters long'
            )
        )    
    );
    public $belongsTo = array(
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'courseid',
            'order' => 'StudentCourse.id'
            //'conditions' => array('Course.id' => 'course_id')
        )
    );
}

