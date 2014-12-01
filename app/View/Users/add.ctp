<?php
echo $this->Form->create('User', array('action' => 'add'));
echo $this->Form->input('name', array('label' => 'Name: '));
echo $this->Form->input('username', array('label' => 'Username: '));
echo $this->Form->input('password', array('label' => 'Password: '));
echo $this->Form->end('Register');