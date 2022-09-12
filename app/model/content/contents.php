<?php

$tblname = 'contents';
$column  = $this->increments($tblname);

if($this->post){

    $options['search']['scope'] = 'LIKE';
    
    if(!isset($this->post['keyword'])){
        $this->post['keyword'] = '';
    }
    
    if(!isset($this->post['columns'])){
        $this->post['columns'] = $this->columnList($tblname);
    }
    foreach ($this->post['columns'] as $xcolumn) {
        $options['search']['or'][] = array($xcolumn=>'%'.$this->post['keyword'].'%');
    }
    
}
// Limit control
if(!empty($this->post['limit'])){
    $options['limit'] = $this->post['limit'];
}

// Sort control
if(empty($this->post['sort'])){
    $this->post['sort'] =  'asc';
}

$options['sort'] = $column.':'.$this->post['sort'];

$options['navigation'] = [
    'route_path'=>'panel/contents'
];
$contents = $this->pagination('contents', $options);