<?php

require './Mind.php';

$conf = array(
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
        'host'      =>  'localhost', // sqlsrv için: www.example.com\\MSSQLSERVER,'.(int)1433
        'dbname'    =>  'news_manager', // ads, app/migration/ads.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ]
);
$Mind = new Mind($conf);

$Mind->route('/', ['app/model/content/contents', 'app/views/panel/content/contents'], 'app/migration/install');
$Mind->route('panel/contents:p', ['app/model/content/contents', 'app/views/panel/content/contents']);
$Mind->route('panel/content/add', 'app/views/panel/content/add');
$Mind->route('panel/content/edit:content_id', 'app/views/panel/content/edit');
$Mind->route('panel/content/status:content_id', 'app/request/panel/content/status');
$Mind->route('panel/content/remove:content_id', 'app/request/panel/content/remove');
$Mind->route('panel/content/', 'app/views/panel/content/contents');
// $Mind->route('panel/backup', 'app/request/backup');
