<?php

$schema = [
    'id:increments',
    'title',
    'position',
    'tag',
    // 'size',
    // 'width',
    // 'height',
    'image',
    'description',
    'status:string@5',
    'created_at:string@19',
    'updated_at:string@19'
];

if(!$this->is_table('contents')){
    $this->tableCreate('contents', $schema);
}