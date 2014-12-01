<!-- File: /app/View/StudentCourses/view.ctp -->

<h1><?php echo 'Add student course'; ?></h1>
<?php
//echo $this->Form->create('StudentCourse', array('action'=>'add'));
$options = array();
for($i=1;$i<10;$i++)
{
    array_push($options, $i);   
}
//foreach ($list as $stud) {
//    //$arr = array($stud['StudentCourse']['user_name'] => $stud['StudentCourse']['user_name'] );
//    array_push($options, $stud['StudentCourse']['user_name']);
//    //array_merge($options, $arr);
//}
$options = array_combine($options,$options);
//echo $this->Form->create(null, array('url' => array('controller' => 'studentcourses', 'action' => 'index', )));
echo $this->Form->create();
echo $this->Form->input('courseid', array('type' => 'select', 'options' => $options, 'values' => $options,array('empty'=>false)));
echo $this->Form->input('grade', array('label'=>'Grade: '));
echo $this->Form->input('username', array('label', 'Username'));
//echo $this->Form->select('courses', $options, array('empty' => false));
//$this->set('graded', 0);
echo $this->Form->end('Find');
unset($stud);
unset($options);
?>