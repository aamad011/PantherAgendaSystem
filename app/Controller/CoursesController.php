<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 11/24/2014
 * Time: 10:07 PM
 */

class CoursesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('courses', $this->Course->find('all'));
    }

    public function view($id = null) {
        if(!$id) {
            throw new NotFoundException(__('Invalid Course'));
        }

        $course = $this->Course->findById($id);
        if(!$course) {
            throw new NotFoundException(__('Invalid Course'));
        }
        $this->set('course', $course);
    }
}