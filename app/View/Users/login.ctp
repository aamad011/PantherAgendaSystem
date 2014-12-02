<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>
    <legend>
        <?php echo __('Please enter your username and password'); ?>
    </legend>
    <?php echo $this->Form->input('username');
    echo $this->Form->input('password');
    ?>
</fieldset>

<?php echo $this->Form->end(__('Login')); ?>
    <?php
    echo $this->Form->create('Page', array('action' => 'home','type'=>'button'));
    echo $this->Form->end(__('Cancel'));
    ?>
</div>