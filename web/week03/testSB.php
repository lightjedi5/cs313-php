<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'db_connect.php';

        $statement = $db->query('SELECT username, password FROM note_user');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
          echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
        }
    ?>
</body>
</html>