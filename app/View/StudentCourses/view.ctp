<!-- File: /app/View/StudentCourses/view.ctp -->

<h1><?php echo 'StudentCourse'; ?></h1>
<?php
//echo $this->Form->create('StudentCourse', array('action'=>'add'));
$options = array();
foreach ($list as $stud) {
    //$arr = array($stud['StudentCourse']['user_name'] => $stud['StudentCourse']['user_name'] );
    array_push($options, $stud['StudentCourse']['courseid']);
    //array_merge($options, $arr);
}
$options = array_combine($options,$options);
//echo $this->Form->create(null, array('url' => array('controller' => 'studentcourses', 'action' => 'index', )));
echo $this->Form->create();
//echo $this->Form->label('Ids: ');
echo $this->Form->input('courses', array('type' => 'select', 'options' => $options, 'values' => $options,array('empty'=>false)));
//echo $this->Form->select('courses', $options, array('empty' => false));
echo $this->Form->end('add');
unset($stud);
unset($options);
?>

