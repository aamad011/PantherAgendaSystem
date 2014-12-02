<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 11/23/2014
 * Time: 11:41 AM
 */

class Event extends AppModel {
    public $belongsTo = array(
        'GradedEvent' => array(
            'className' => 'GradedEvent',
            'foreignKey' => 'id',
            //'order' => 'StudentCourse.id'
            //'conditions' => array('Course.id' => 'course_id')
        )
    );
} 