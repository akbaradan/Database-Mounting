<?php

require_once('db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->query("select * from jurusan where id_departemen='$id'");
    ?>
    <option value="0">Pilih jurusan</option>
    <?php while ($data = $result->fetch_object()): ?>
        <option value="<?php echo $data->id ?>"><?php echo $data->nama ?></option>
    <?php
    endwhile;
}