<!-- File: /app/View/StudentCourses/view.ctp -->

<h1><?php echo 'Add student course'; ?></h1>
<?php
//echo $this->Form->create('StudentCourse', array('action'=>'add'));
//$options = array();
//for($i = 0; $i<= count($courselist); $i++)
//{
//    if(isset($courselist[$i]))
//    {
//        $courselist[$courselist[$i]] = $courselist[$i];
//        unset($courselist[$i]);
//    }
//}
//$options = array_combine($options,$options);
//echo $this->Form->create(null, array('url' => array('controller' => 'studentcourses', 'action' => 'index', )));
echo $this->Form->create();
echo $this->Form->input('courseid', array('label'=>'Course ID','type' => 'select', 'options' => $courselist,array('empty'=>false)));
//echo $this->Form->input('grade', array('label'=>'Grade: '));
echo $this->Form->input('username', array('label', 'Username'));
//echo $this->Form->select('courses', $options, array('empty' => false));
//$this->set('graded', 0);
echo $this->Form->end('Add');
//unset($stud);
//unset($options);
?>