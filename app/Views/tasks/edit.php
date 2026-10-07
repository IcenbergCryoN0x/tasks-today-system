<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <p>
        <a href="<?= base_url('/tasks') ?>">Back to Tasks</a> |
        <a href="<?= base_url('/logout') ?>">Logout</a>
    </p>

    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <form action="<?= base_url('/tasks/update/' . $task['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label>Title:</label><br>
        <input
            type="text"
            name="title"
            value="<?= old('title', $task['title']) ?>"
        >
        <br><br>

        <label>Description:</label><br>
        <textarea name="description"><?= old('description', $task['description'] ?? '') ?></textarea>
        <br><br>

        <label>Task Date:</label><br>
        <input
            type="date"
            name="task_date"
            value="<?= old('task_date', $task['task_date']) ?>"
        >
        <br><br>

        <button type="submit">Update Task</button>
    </form>
</body>
</html>