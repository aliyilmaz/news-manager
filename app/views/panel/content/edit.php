<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=$this->base_url;?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content | News Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/assets/header.css">
    <script src="public/assets/lib/mediainfo.js/mediainfo.min.js"></script>
    <script src="public/assets/lib/mediainfo.js/script.js"></script>
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="" type="image/x-icon">
</head>
<body>
<?php $this->addLayer('app/views/panel/header'); ?>
<?php $this->addLayer('app/request/panel/content/edit');?>
<?php $content = $this->theodore('contents', ['id'=>$this->post['content_id']]); ?>
<div class="m-4">

    <h2>Edit Content</h2>
    <form action="panel/content/edit" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mt-3">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" placeholder="Title" value="<?=$content['title'];?>">
            </div>
            <div class="form-group mt-3">
                <label for="position">Position</label>
                <input class="form-control" type="text" name="position" placeholder="Position" value="<?=$content['position'];?>">
            </div>
            <div class="form-group mt-3">
                <label for="tag">Tag</label>
                <input class="form-control" type="text" id="tag" name="tag" placeholder="Tag" value="<?=$content['tag'];?>">
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input class="form-control" type="file" name="image" id="fileinput" accept=".jpeg, .jpg, .png, .webp, .svg, .gif">
            </div>
            <div class="mt-3" id="output">
            <?php if(!empty($content['image'])){ echo '<img style="max-width:100%;" src="'.$content['image'].'">'; };?>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mt-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description"><?=$content['description']?></textarea>
            </div>
        </div>
        <div>
            <?php 
            if(isset($this->post['title'])){

                if(!empty($this->errors)) {
                    foreach ($this->errors as $errors) {
                        foreach ($errors as $key => $error) {
                            echo '<strong style="font-size:10px; color:red;">* '.$error.'.</strong><br>';
                        }
                    }
                } else {
                    echo '<strong style="color:green;">Content updated.</strong>';
                }
                $this->redirect($this->page_back, 5, '#redirect-time');
            }
            ?>
        </div>
        <input type="hidden" name="content_id" value="<?=$this->post['content_id'];?>">
        <div class="col-lg-12 pt-2">
            <button class="btn btn-primary rounded-0" type="submit">Save</button>
            <a class="btn btn-dark rounded-0" href="panel/contents">Contents</a>
        </div>
    </div>
    
    <?=$_SESSION['csrf']['input'];?>
    </form>

</div>

<script>
    let divOutputHtml = '',
        divOutputElement = document.body.querySelector('div#output');

    getmediainfojs('#fileinput', (response, e) => {
      divOutputElement.innerHTML = '';

      for (let index = 0; index < e.target.files.length; index++) {
        mime_type = response[index]['media']['mime_type'].split('/')[0];
        filename = truncate(basename(response[index]['media']['filename']), 60);

        // .jpeg, .jpg, .png, .webp, .svg, .gif
        if(mime_type == 'image'){
          divOutputHtml = '<img src="'+getBlobUrl(e.target.files[index])+'" title="'+filename+'" class="img-fluid">';
        }

        divOutputElement.appendChild(stringToHTML(divOutputHtml));
      }

    });

    $(document).ready(function() {
        // $('#description').summernote();
        $('#description').summernote({
        // placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 300,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        var tagify = new Tagify(document.querySelector('#tag'), {
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        });
    });
  </script>
</body>
</html>

