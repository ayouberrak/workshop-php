<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <?php if(isset($success)) echo "<p style='color:green'>$success</p>"; ?>

    <h1>sign up</h1>
    <form action="" method="POST">
        <label for="firstname">firstname</label><br>
        <input type="text" name="firstname"><br>

        <label for="lastname">lastname</label><br>
        <input type="text" name="lastname"><br>

        <label for="type">type</label><br>
        <select name="type">
            <option value="patient">patient</option>
            <option value="medecin">medecin</option>
        </select>

        <label for="pass">pasword</label><br>
        <input type="text" name="pass"><br>

        <button type="submit">s'iscrire</button>
    </form>
</body>
</html>