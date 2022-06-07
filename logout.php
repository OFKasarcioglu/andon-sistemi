<?php
session_start();
session_destroy();
header("Location:system-login.php?DURUM=CIKIS");
