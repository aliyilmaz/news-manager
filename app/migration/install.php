<?php


$files = [
    'mysql' => 'app/migration/mysql_backup_2022_09_09_10_26_49.json',
    'sqlite' => 'app/migration/sqlite_backup_2022_09_09_10_28_34.json',
    'sqlsrv' => 'app/migration/sqlsrv_backup_2022_09_09_10_28_04.json'
];

$this->restore($files[$this->db['drive']]);


?>