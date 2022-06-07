<?php
try {
    $DataBase = new PDO ("mysql:host=localhost; dbname=j32mc8jzhlk6qmchtu;charset=utf8", 'root',
        '123456789');
    /**echo "Database bağlantısı başarılı";**/
} catch (PDOException $Error) {
    echo $Error->getMessage();
}
