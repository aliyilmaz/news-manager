<?php

$schema = [
    'id:increments',
    'position',
    'title',
    // 'size',
    // 'width',
    // 'height',
    'image',
    'url',
    'start_date:string@19',
    'end_date:string@19',
    'status:string@5',
    'created_at:string@19',
    'updated_at:string@19'
];

if(!$this->is_table('contents')){
    $this->tableCreate('contents', $schema);
}