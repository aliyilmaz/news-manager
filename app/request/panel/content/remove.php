<?php

if(isset($this->post['content_id'])){
    $content = $this->theodore('contents', ['id'=>$this->post['content_id']]);
    if(!empty($content)){
        $this->rm_r($content['image']);
        $this->delete('contents', $this->post['content_id'], 'id');
    }

}
$this->redirect($this->page_back);