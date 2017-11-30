<?php

if (isset($_POST['new'])) {
    mkdir($_POST['new'], 0755);
    chmod($_POST['new'], 0755);
}
?>