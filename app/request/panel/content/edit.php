<?php

// $this->print_pre($this->post);

$values = [];
$values['updated_at'] = $this->timestamp;
$content = $this->theodore('contents', ['id'=>$this->post['content_id']]);

$rule = [
   'title'        => 'required',
   'position'     => 'required'
];

$message = [
   'title'=>[
      'required'=>'The title must be specified.'
   ],
   'position'=>[
      'required'=>'The position must be specified.'
   ]
];

if(isset($this->post['title'])){
   
   $this->post['title'] = (!empty($this->post['title'])) ? $this->post['title'] : $content['title'];
   $this->post['position'] = (!empty($this->post['position'])) ? $this->permalink($this->post['position']) : $content['position'];
   $this->post['tag'] = (!empty($this->post['tag'])) ? $this->post['tag'] : $content['tag'];
   $this->post['description'] = (!empty($this->post['description'])) ? $this->post['description'] : $content['description'];

   if($this->validate($rule, $this->post, $message)){
      $values['title'] = $this->post['title'];
      $values['position'] = $this->permalink($this->post['position']);
      $values['slug'] = $this->permalink($this->post['title']);
      $values['tag'] = $this->post['tag'];
      $values['description'] = $this->post['description'];
   }

   if(empty($this->errors)){

      
      if(!empty($this->post['image']['name'])){

         if(!$this->is_type($this->post['image']['name'], ['jpeg', 'jpg', 'png', 'webp', 'svg', 'gif'])){
            $this->errors['image']['type'] = 'The file type of the ads image must be of a permitted type.';
         } else {

            $image = $this->upload($this->post['image'], 'public/contents/'.date('Y-m-d').'/');
            if(!empty($image)){
               $this->rm_r($content['image']);
               $values['image'] = $image[0]; 
            } else {
               $this->errors['image']['required'] = 'The image could not be loaded.';
            }
            
         }
      }

   }

   if(empty($this->errors)){
      $this->update('contents', $values, $content['id'], 'id');
   }
}
