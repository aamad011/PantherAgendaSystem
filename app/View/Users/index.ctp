<h1>Users in DB</h1>
<table>
    <tr>
        <th>Username</th>
        <th>Real Name</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php echo $this->Html->link('Create User',array('controller' => 'users','action' => 'add')); ?>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['username']; ?></td>
            <td><?php echo $user['User']['name']; ?></td>
        </tr>
    <?php endforeach; ?>
    <br>
    <?php unset($user); ?>
</table>
