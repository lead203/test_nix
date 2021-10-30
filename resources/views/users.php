<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Testing - Users</title>
</head>
<body>
<div>
    <h2>Users</h2>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Group</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user):?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['group']?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<form action="/users" method="post">
    <input name="name" placeholder="Name" type="text">
    <input name="email" placeholder="Email" type="email">
    <input type="submit" name="submit">
</form>
</body>
</html>
