<?php

require "config.php";
$message = "";

if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["author"])){
    $judul = $_POST["title"];
    $deskripsi = $_POST["description"];
    $penulis = $_POST["author"];
    $data = "INSERT INTO buku (title, description, author) VALUE (:title, :description, :author)";
    $statement = $connection ->prepare($data);
    if ($statement ->execute([":title" => $judul, ":description"=>$deskripsi, ":author"=>$penulis])){
        $message = "Berhasil!!!";
    }
}
?>

<?php require "header.php"?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <center><h2>Formulir Pendataan Buku</h2></center>
        </div>

        <div class="card-body">
            <?php if (!empty($message)): ?>
            <div class="alert alert-success">
                <?= $message ?>
            </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Judul Buku</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Deskripsi Singkat tentang Buku</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Penulis Buku</label>
                    <input type="text" name="author" id="author" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Create Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require "footer.php"?>
