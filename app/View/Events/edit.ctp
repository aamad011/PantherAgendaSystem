<!-- File: /app/View/Events/edit.ctp -->

<h1>Edit Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('reminder_date');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Event');
?>