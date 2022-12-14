<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=$this->base_url;?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Content | News Manager</title>

    <!-- jquery -->
    <script src="public/assets/lib/jquery-3.6.1.min.js"></script>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="public/assets/lib/bootstrap-5.2.0/css/bootstrap.min.css" />
    <script src="public/assets/lib/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="public/assets/lib/bootstrap-icons-1.9.1/bootstrap-icons.css">
    
    <link rel="stylesheet" href="public/assets/header.css">
    
    <!-- mediainfo -->
    <script src="public/assets/lib/mediainfo.js/mediainfo.min.js"></script>
    <script src="public/assets/lib/mediainfo.js/script.js"></script>

    <!-- tagify -->
    <script src="public/assets/lib/tagify/dist/tagify.min.js"></script>
    <script src="public/assets/lib/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="public/assets/lib/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    
    <!-- summernote -->
    <link rel="stylesheet" href="public/assets/lib/summernote-0.8.18/summernote-lite.min.css" />
    <script src="public/assets/lib/summernote-0.8.18/summernote-lite.min.js"></script>

    <link rel="shortcut icon" href="data:;base64,iVBORw0KGgo=" type="image/x-icon">
    
</head>
<body>
    <?php $this->addLayer('app/views/panel/header'); ?>
    <div class="m-4">

        <h2>New Content</h2>
        <form action="panel/content/add" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group mt-3">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" placeholder="Title">
                </div>
                <div class="form-group mt-3">
                    <label for="position">Position</label>
                    <input class="form-control" type="text" name="position" placeholder="Position">
                </div>
                <div class="form-group mt-3">
                    <label for="tag">Tag</label>
                    <input class="form-control" id="tag" type="text" name="tag" placeholder="Tag">
                </div>
                <div class="form-group mt-3">
                    <label for="image">Image</label>
                    <input class="form-control" type="file" name="image" id="fileinput" accept=".jpeg, .jpg, .png, .webp, .svg, .gif">
                </div>
                <div class="mt-3" id="output"></div>
            </div>
            <div class="col-lg-8">
                <div class="form-group mt-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                </div>
            </div>
            
            <div>
                <?php 
                    $this->addLayer('app/request/panel/content/add');
                    if(isset($this->post['title'])){

                        if(!empty($this->errors)) {
                            foreach ($this->errors as $errors) {
                                foreach ($errors as $key => $error) {
                                    echo '<strong style="font-size:10px; color:red;">* '.$error.'.</strong><br>';
                                }
                            }
                        } else {
                            echo '<strong style="color:green;">Content added.</strong>';
                        }
                        $this->redirect($this->page_back, 5, '#redirect-time');
                    }
                ?> 
                <em id="redirect-time"></em>
            </div>
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

