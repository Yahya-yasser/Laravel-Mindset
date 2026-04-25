<!DOCTYPE html>
<html>
<head>
    <title>Task Completed</title>
</head>
<body style="font-family: sans-serif;">
    <h2>Hello {{ $task->user->name }},</h2>
    <p>Great news! Your task <strong>"{{ $task->title }}"</strong> has been marked as <strong>Done</strong>.</p>
    <p>Task Details:</p>
    <ul>
        <li><strong>Title:</strong> {{ $task->title }}</li>
        <li><strong>Priority:</strong> {{ $task->priority }}</li>
        <li><strong>Completed At:</strong> {{ now()->format('Y-m-d H:i:s') }}</li>
    </ul>
    <p>Thank you for using our Task Management System!</p>
</body>
</html>
