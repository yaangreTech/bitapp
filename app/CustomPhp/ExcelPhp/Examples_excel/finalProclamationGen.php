<?php

require_once(app_path('CustomPhp/customHelpers.php'));
$file = file_get_contents("final_proclamation.json");
$file = json_decode($file, true);


FinalProclamation("2021-2022", "Electrical Engineering", "Electrical Engineering", 1, $file);
