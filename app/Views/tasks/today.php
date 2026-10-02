<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>
<body>

    <h1>Tasks for Today</h1>

    <nav>
        <a href="<?= base_url('/') ?>">Welcome</a> |
        <a href="<?= base_url('/tasks') ?>">All Tasks</a> |
        <a href="<?= base_url('/profile') ?>">Profile</a> |
        <a href="<?= base_url('/about') ?>">About</a>
    </nav>

    <hr>

    <?php if (empty($tasks)): ?>
        <p>No tasks scheduled for today.</p>
    <?php else: ?>

        <table border="1" cellpadding="8">
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Date</th>
            </tr>

            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php endif; ?>

</body>
</html>