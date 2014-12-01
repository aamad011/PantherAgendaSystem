<?php
class StudentCoursesController extends AppController{
    public $helpers = array('Html', 'Form');

    public function index($conditions = null) {
        
        //need to redo this when applying a real condition
        if($conditions === null){
            $this->set('studentcourses', $this->StudentCourse->find('all'));            
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
        if($this->request->is('post'))
        {
            $this->StudentCourse->create();
            if ($this->StudentCourse->save($this->request->data)) {
                $this->Session->setFlash(__('Your query has been executed.'));
                
                $this->StudentCourse->save(
                    array(
                        'courseid' => $this->request->data['StudentCourse']['courseid'],
                        'grade' => $this->request->data['StudentCourse']['grade'], 
                        'username' => $this->request->data['StudentCourse']['username']
                    )
               );
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

