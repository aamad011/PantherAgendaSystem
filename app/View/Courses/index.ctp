<!-- File: /app/View/Courses/index.ctp -->

<?php
echo $this->Form->create('Course');
echo $this->Form->input('courses', array('type' => 'select', 'options' => $courses));
echo $this->Form->end('Join');
?>