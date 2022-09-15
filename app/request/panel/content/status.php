<?php

$content = $this->theodore('contents', ['id'=>$this->post['content_id']]);
$this->update('contents', ['status'=>($content['status']) ? 0 : 1, 'updated_at'=>$this->timestamp], $this->post['content_id']);
$this->redirect($this->page_back);