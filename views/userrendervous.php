<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="../public/js/rendervous.js" defer></script>
    <title>Document</title>
</head>
<body>
    <h1>user dashbord</h1>
    <h2>render-vous</h2>
        <button id="btn_add">ajouter une render vous</button><br> <br>

        <form action="" method="POST" id="form_add">
            <h2>ajouter render vous </h2>

            <input type="hidden" name="id">
            <label for="fullnameM">medecin</label><br>
            <select name="fullnameM">
                <?php foreach($medecin as $rowU){ ?>
                <option value="<?= $rowU['id_user'] ?>"><?= $rowU['fullnameuser'] ?></option>
                <?php } ?>
            </select><br>

            <label for="dateR">date de render vous</label><br>
            <input type="date" name="dateR"><br><br>
        </form>

    <table border="1">
        <thead>
            <tr>
                <th>Full name for the patient</th>
                <th>Full name for the medecin</th>
                <th>Date render vous</th>
                <th>Status</th>
                <th>Factures</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($render_vous_user as $row) { ?>
                <tr>
                    <td><?= $row['fullnameP'] ?></td>
                    <td><?= $row['fullnameM'] ?></td>
                    <td><?= $row['date_rvd'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['montant'] ?></td>
                    <td>Action</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    
</body>
</html>