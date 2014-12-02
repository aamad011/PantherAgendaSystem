
<!-- File: /app/View/StudentCourses/index.ctp -->

<h1>Calculate Grade</h1>
<?php
    echo $this->Form->create();
    if(!$this->request->data){
        echo $this->Form->input('courseid', array('label'=>'Course ID','type' => 'select', 'options' => $courselist,array('empty'=>false)));
        
        echo $this->Form->input('username', array('label', 'Username'));
        echo $this->Form->end('Find');
    }
    else {
        
        $options = array();
        $i = 0;
        //echo var_dump($allpartuser);
        foreach ($allpartuser as $event) {
            $options[++$i] = $event['Event']['name'];
        }
        //echo var_dump($options);
        //$options = array_combine($options,$options);
        echo $this->Form->input('courseid', array('label'=>'Course ID','type' => 'select', 'options' => $options,array('empty'=>false)));
        
    //echo $this->Form->input('grade', array('label'=>'Grade: '));
        echo $this->Form->input('username', array('label', 'Username'));
        echo $this->Form->end('Find');
        ?>
        <table>
        <tr>
            <th>User Name</th>
            <th>Event Grade</th>
            <th>Event Weight</th>
            <th>Course Name</th>


        </tr>

        <!-- Here is where we loop through our $posts array, printing out post info -->
        <?php foreach ($givenuser as $u): ?>
        <tr>

            <td><?php echo $u['Event']['username']; ?></td>
            <td><?php echo $u['GradedEvent']['grade']; ?></td>
            <td><?php echo $u['GradedEvent']['weight']; ?></td> 
            <td><?php echo $u['Event']['name']; ?></td> 
        </tr>
        <?php endforeach; ?>
        <?php unset($u); ?>

    </table>
<?php 
    unset($givenuserd);
    unset($givenuser);}?>    

    