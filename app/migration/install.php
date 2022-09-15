<?php


$files = [
    'mysql' => 'app/migration/mysql_backup_2022_09_15_17_46_16.json',
    'sqlite' => 'app/migration/sqlite_backup_2022_09_15_17_45_46.json',
    'sqlsrv' => 'app/migration/sqlsrv_backup_2022_09_15_17_46_41.json'
];

$this->restore($files[$this->db['drive']]);


?>