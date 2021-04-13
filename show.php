<?php

require "config.php";

$data = "SELECT * FROM buku";
$statement = $connection->prepare($data);
$statement->execute();
$listbook = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php require "header.php"?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Data Buku</h2>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Penulis</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listbook as $item): ?>
                <tr>
                    <th scope="row"><?= $item->id; ?></th>
                    <td><?= $item->title; ?></td>
                    <td><?= $item->description; ?></td>
                    <td><?= $item->author; ?></td>
                    <td>
                        <a href="delete.php?id=<?= $item->id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require "footer.php"?>
