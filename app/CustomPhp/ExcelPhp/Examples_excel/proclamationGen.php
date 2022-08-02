<?php
require "../excel/proclamation.php";

$msg = "After an in-depth check, are declared definitively admitted the students whose names follow by order of merit:";
$juryMembers = [
    "Nana Jeremie",
    "Sanou Lougoudoro",
    "Yanogo Yves Wengundi Patrick"
];
$file = fopen('data.json', 'r');
$data = json_decode(fread($file, filesize('data.json')), true);
Proclamation("2021-2022", "Normal", "Electrical Engineering", "L2S2", $msg, $data, $juryMembers, "Dr Kabore W. Rodrigue");