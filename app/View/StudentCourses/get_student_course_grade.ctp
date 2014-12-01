<!-- File: /app/View/StudentCourses/view.ctp -->

<h1><?php echo 'Get student grade'; ?></h1>
<?php
//echo $this->Form->create('StudentCourse', array('action'=>'add'));
$options = array();
foreach ($list as $stud) {
    //$arr = array($stud['StudentCourse']['user_name'] => $stud['StudentCourse']['user_name'] );
    array_push($options, $stud['StudentCourse']['username']);
    //array_merge($options, $arr);
}
$options = array_combine($options,$options);
//echo $this->Form->create(null, array('url' => array('controller' => 'studentcourses', 'action' => 'index', )));
echo $this->Form->create();
//echo $this->Form->label('Ids: ');
echo $this->Form->input('students', array('type' => 'select', 'options' => $options, 'values' => $options,array('empty'=>false)));
//echo $this->Form->select('courses', $options, array('empty' => false));
echo $this->Form->end('Find');
unset($stud);
unset($options);
?>
<table>
    <tr>
        <th>Course Id</th>
        <th>Course Grade</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php if(!empty($studentcourses)){
        foreach ($studentcourses as $studentcourse): ?>
    <tr>
        <td><?php echo $studentcourse['StudentCourse']['courseid']; ?></td> 
        <td><?php echo $studentcourse['StudentCourse']['grade']; ?></td> 
    </tr>
    <?php endforeach;} ?>
    <?php unset($studentcourse); ?>
    
</table>