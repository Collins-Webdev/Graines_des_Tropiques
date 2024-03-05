<?php
try {
    $access = new PDO("mysql:host=localhost:3306;dbname=grainest_id21089321_les_graines_du_tropique;charset=utf8", "grainest_cres", "!9N4^0vf8WQrAy!");
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>