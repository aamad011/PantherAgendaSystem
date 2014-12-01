<h1>Users in DB</h1>
<ul id="idx" style="float: left">
    <li><?php echo $this->Html->link('Create User',array('controller' => 'users','action' => 'add')); ?></li>
    <li><?php echo $this->Html->link('Login User',array('controller' => 'users','action' => 'login')); ?></li>
</ul>
<table>
    <tr>
        <th>Username</th>
        <th>Real Name</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <div style="clear: both"></div>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['username']; ?></td>
            <td><?php echo $user['User']['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    <br>
    <?php unset($user); ?>
</table>
