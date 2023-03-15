<?php
header('Content-Type: application/csv');
header('Content-Disposition: attachement; filename="' . $file_name . '"');
echo $users;