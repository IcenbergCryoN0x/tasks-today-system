<!DOCTYPE html>
<html>
<head>
    <title>All Tasks</title>
</head>
<body>

    <h1>All Tasks</h1>

    <nav>
        <a href="<?= base_url('/') ?>">Welcome</a> |
        <a href="<?= base_url('/tasks') ?>">All Tasks</a> |
        <a href="<?= base_url('/profile') ?>">Profile</a> |
        <a href="<?= base_url('/about') ?>">About</a> |
        <a href="<?= base_url('/tasks/new') ?>">New Task</a> |
        <a href="<?= base_url('/logout') ?>">Logout</a>
    </nav>

    <hr>

    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
                <td>
                    <a href="<?= base_url('/tasks/edit/' . $task['id']) ?>">
                        Edit
                    </a>

                    <form
                        action="<?= base_url('/tasks/archive/' . $task['id']) ?>"
                        method="post"
                        style="display: inline;"
                    >
                        <?= csrf_field() ?>
                        <button type="submit">Archive</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>