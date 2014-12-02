<!-- File: /app/View/Courses/index.ctp -->

<?php
//echo $this->Form->create('Course);

for($i = 0; $i<= count($courses); $i++)
{
    if(isset($courses[$i]))
    {
        $courses[$courses[$i]] = $courses[$i];
        unset($courses[$i]);
    }
}
echo $this->Form->create();
echo $this->Form->input('course', array('type' => 'select', 'options' => $courses));
echo $this->Form->end('Join');

?>