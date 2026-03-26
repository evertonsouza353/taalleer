<?php
include "db.php";

if ($conn) {
    echo "Connectie met database gelukt!";
} else {
    echo "Connectie mislukt!";
}
?>