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
        $this->set('courses', $this->Course->find('list'));
        return $this->Course->find('list');
//        if($this->request->is('post'))
//        {
//            $thing = '';
//            foreach ($this->request->data as $x=>$y):
//                foreach ($y as $key => $value):
//                   $thing .= $x . '    '. $key .'        ' . $value; 
//                endforeach;
//            endforeach;
//            echo $thing;
//            $this->Session->setFlash('This is the value '.$this->request->data['Course']['course'].'....');
//            return;
//            //echo $this->request->data('courses');
//        }
        
    }

    // Don't think that this function is necessary
    /*
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
    */
}