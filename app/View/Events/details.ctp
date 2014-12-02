<!-- File: /app/View/Events/details.ctp -->

<h1><?php echo h($event['Event']['name']); ?></h1>

<p><small>Reminder Date: <?php echo $event['Event']['reminder_date']; ?></small></p>

<p><?php echo h($event['Event']['description']); ?></p>