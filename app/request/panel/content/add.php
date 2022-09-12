<?php

// $this->print_pre($this->post);

$values = [];
$values['created_at'] = $this->timestamp;
$values['status'] = 1;

$rule = [
   'title'        => 'required',
   'url'          => 'required',
   'position'     => 'required'
];

$message = [
   'title'=>[
      'required'=>'The title must be specified.'
   ],
   'url'=>[
      'required'=>'The url must be specified.'
   ],
   'position'=>[
      'required'=>'The position must be specified.'
   ]
];

if(isset($this->post['title'])){
   
   $this->post['title'] = (!empty($this->post['title'])) ? $this->post['title'] : '';
   $this->post['url'] = (!empty($this->post['url'])) ? $this->post['url'] : '';
   $this->post['position'] = (!empty($this->post['position'])) ? $this->post['position'] : '';
   
   if($this->validate($rule, $this->post, $message)){
      $values['title'] = $this->post['title'];
      $values['url'] = $this->post['url'];
      $values['position'] = $this->permalink($this->post['position']);
   }

   if(empty($this->post['image']['name'])){
      $this->errors['image']['required'] = 'The image must be selected.';
   }

   if(empty($this->errors)){

      if(!$this->is_type($this->post['image']['name'], ['jpeg', 'jpg', 'png', 'webp', 'svg', 'gif'])){
         $this->errors['image']['type'] = 'The file type of the ads image must be of a permitted type.';
      } else {

         $image = $this->upload($this->post['image'], 'public/contents/'.date('Y-m-d').'/');
         if(!empty($image)){
            $values['image'] = $image[0]; 
         } else {
            $this->errors['image']['required'] = 'The image could not be loaded.';
         }
         
      }


   }
   
   if(empty($this->errors)){
      $this->insert('contents', $values);
   }

   $this->addLayer('app/middleware/lifetime/content');
}
