
<!-- File: /app/View/StudentCourses/index.ctp -->

<h1>Student Courses</h1>
<table>
    <tr>
        
        <td><?php echo $this->Html->link('All',
array('controller' => 'studentcourses', 'action' => 'getStudentCourses')); ?></td>
        <td><?php echo $this->Html->link('Get courseid',
array('controller' => 'studentcourses', 'action' => 'view')); ?></td> 
        <td><?php echo $this->Html->link('Add Student Course',
                array('controller' => 'studentcourses', 'action' => 'addStudentCourse')); ?></td>
        <td><?php echo $this->Html->link('Get Student Grade: Jimmy',
array('controller' => 'studentcourses', 'action' => 'getStudentCourseGrade')); ?></td> 
    <tr>
        <th>Id</th>
        <th>Course Id</th>
        <th>Course Grade</th>
        <th>User Name</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($studentcourses as $studentcourse): ?>
    <tr>
        
        <td><?php echo $studentcourse['StudentCourse']['id']; ?></td>
        <td><?php echo $studentcourse['StudentCourse']['courseid']; ?></td> 
        <td><?php echo $studentcourse['StudentCourse']['grade']; ?></td> 
        <td><?php echo $studentcourse['StudentCourse']['username']; ?></td> 
    </tr>
    <?php endforeach; ?>
    <?php unset($studentcourse); ?>
    
</table>