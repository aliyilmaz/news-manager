<?php


$files = [
    'mysql' => 'app/migration/mysql_backup_2022_09_12_12_15_03.json',
    'sqlite' => 'app/migration/sqlite_backup_2022_09_12_12_15_44.json',
    'sqlsrv' => 'app/migration/sqlsrv_backup_2022_09_12_12_17_36.json'
];

$this->restore($files[$this->db['drive']]);


?>