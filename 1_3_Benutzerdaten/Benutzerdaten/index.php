<?php
include "lib/func.inc.php";

$users = [];
$search = $_GET['suche'] ?? '';

if ($search !== '') {
    $users = getFilteredData($search);
} else {
    $users = getAllData();
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="" crossorigin="anonymous">

    <title>Benutzerdaten</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5 m-3">Benutzerdaten anzeigen</h1>

    <form method="get" class="row m-3 align-items-center">
        <label for="suche" class="col-sm-1 col-form-label">Suche:</label>
        <div class="col-sm-3">
            <input type="text" id="suche" name="suche"
                   value="<?= htmlspecialchars($search) ?>"
                   class="form-control" />
        </div>
        <div class="col-sm-auto">
            <button type="submit" class="btn btn-primary me-2">Suchen</button>
            <a href="?" class="btn btn-secondary">Leeren</a>
        </div>
    </form>

    <table class="table table-striped table-bordered w50">
        <thead>
        <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Geburtsdatum</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td>
                        <a href="lib/details.php?id=<?= $user['id'] ?>">
                            <?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?>
                        </a>
                    </td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['birthdate']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">Keine Daten gefunden</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
