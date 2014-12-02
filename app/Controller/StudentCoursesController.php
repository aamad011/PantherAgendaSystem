<?php
App::import('Controller', 'Courses');
App::import('Controller', 'Events');
class StudentCoursesController extends AppController{
    public $helpers = array('Html', 'Form');

    public function index($conditions = null) {
        
        //need to redo this when applying a real condition
        if($conditions === null){
            $this->set('studentcourses', $this->StudentCourse->find('all'));   
            //$cc = new CoursesController();
            //$this->set('courselist',$cc->index());
        }
        else{
            $thing = explode(' ', $conditions);
            $condition = array('conditions' => array($thing[0] => $thing[1]));
            $this->set('studentcourses', $this->StudentCourse->find('all', $condition));
        }

        
    }
    public function view(){
        if ($this->request->is('post')) {
          //echo $this->request->data['StudentCourse']['courses'];
          if ($this->request->data) {
                $this->Session->setFlash(__('Your query has been executed.'));
                $user = 'StudentCourse.courseid ' . $this->request->data['StudentCourse']['courses'];
                return $this->redirect(array('action' => 'index', $user));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
        $this->set('list', $this->StudentCourse->find('all'));
        //$this->set('studentcourses',$this->StudentCourse->find('all'));
    }
    public function addStudentCourse($coursename = null){
        $cc = new CoursesController();
        $this->set('courselist',$cc->index());
        if($this->request->is('post'))
        {
            $this->StudentCourse->create();
            if ($this->StudentCourse->save($this->request->data)) {
                $this->Session->setFlash(__('Your query has been executed.'));
                
                $this->StudentCourse->save(
                    array(
                        'courseid' => $this->request->data['StudentCourse']['courseid'],
                        'grade' => null, 
                        'username' => $this->request->data['StudentCourse']['username']
                    )
               );
                return;
            }
            else{
               $this->Session->setFlash(__('Your query has failed to executed.'));
            }
        }
        
        
    }
    public function getStudentCourses(){
        $this->set('studentcourses',$this->StudentCourse->find('all'));
        $this->render('index');  
    }
    public function calculateTentativeGrade(){
        $ec = new EventsController();
        if($this->request->is('post')){
            if($this->request->data)
            {
                echo  $this->request->data['StudentCourse']['username'];
                echo  $this->request->data['StudentCourse']['courseid'];
                $this->set('givenuser',$ec->findUser(
                        $this->request->data['StudentCourse']['username'],
                        $this->request->data['StudentCourse']['courseid']));  
                $this->set('allpartuser',$ec->findUser(
                        $this->request->data['StudentCourse']['username']));  
                return;
            }
            echo 'NOTHING';
        }
        $cc = new CoursesController();
        $this->set('courselist', $cc->index());
        $this->set('givenuser',$ec->findUser('jimmy', 2));  
        
        //$this->set('usercourses', $this->StudentCourse->find('all'));
        //$this->render('index');  
    }
    public function getStudentCourseGrade(){
        $this->set('list', $this->StudentCourse->find('all'));
        if ($this->request->is('post')) {
          //echo $this->request->data['StudentCourse']['courses'];
          if ($this->request->data) {
                $this->Session->setFlash(__('Your query has been executed.'));
                //$user = 'StudentCourse.user_name ' . $this->request->data['StudentCourse']['courses'];
                //$this->set('list', $this->StudentCourse->find('all'));
                $this->set('studentcourses',$this->StudentCourse->find('all', array('conditions' => array('StudentCourse.username' => $this->request->data['StudentCourse']['students']))));
                return true; 
          }
          return false;
          
        }
        $this->set('studentcourses','');
    }
    

   
}

