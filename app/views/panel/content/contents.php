<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=$this->base_url;?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/assets/header.css">
    <link rel="stylesheet" href="public/assets/pagination.css">
    <link rel="stylesheet" href="public/assets/table.css">
 
    <title>News Manager</title>
</head>

<body>
    <?php $this->addLayer('app/views/panel/header'); ?>
    <div class="m-4">

        <h2>Contents</h2>
        <br>

        <form action="<?=$this->base_url;?>" method="post">
            <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="limit">Limit</label>
                        <select name="limit" id="limit" class="form-control">
                            <option>5</option>
                            <option>10</option>
                            <option>50</option>
                            <option>100</option>
                            <option>250</option>
                            <option>500</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="sort">Sort by</label>
                        <select name="sort" id="sort" class="form-control">
                            <option value="ASC">First Added < </option>
                            <option value="DESC">Recently Added > </option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="keyword">Keyword</label>
                            <input id="keyword" class="form-control" name="keyword" type="text">
                    </div>
                </div>
                <div class="col-lg-3 d-flex justify-content-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark rounded-0 btn-sm refresh-list">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Filter
                        </button>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <a href="<?=$this->base_url;?>" class="btn btn-light rounded-0 btn-sm refresh-list">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Reset
                        </a>
                    </div>
                </div>
            </div>

            <hr>
            <table class="table" role="table">
                <thead role="rowgroup">
                <tr role="row">
                    <th role="columnheader">Id <input type="checkbox" name="columns[]" value="id"></th>
                    <th role="columnheader">Position <input type="checkbox" name="columns[]" value="position"></th>
                    <th role="columnheader">Title <input type="checkbox" name="columns[]" value="title"></th>
                    <th role="columnheader">Image <input type="checkbox" name="columns[]" value="image"></th>
                    <th role="columnheader">Start Date <input type="checkbox" name="columns[]" value="start_date"></th>
                    <th role="columnheader">End Date <input type="checkbox" name="columns[]" value="end_date"></th>
                    <th role="columnheader">Created At <input type="checkbox" name="columns[]" value="created_at"></th>
                    <th role="columnheader">Updated At <input type="checkbox" name="columns[]" value="updated_at"></th>
                    <th role="columnheader">#</th>
                </tr>
                </thead>
                <tbody role="rowgroup">
                <?php foreach ($contents['data'] as $key => $row) { ?>
                    <tr role="row">
                        <td role="cell" data-label="Id"><?=$row['id'];?></td>
                        <td role="cell" data-label="Position"><?=$row['position'];?></td>
                        <td role="cell" data-label="Title"><?=$row['title'];?></td>
                        <td role="cell" data-label="Image">
                            <a href="<?=$row['image'];?>" target="_blank">View banner</a>
                        </td>
                        <td role="cell" data-label="Start Date"><?=$row['start_date'];?></td>
                        <td role="cell" data-label="End Date"><?=$row['end_date'];?></td>
                        <td role="cell" data-label="Created At"><?=$row['created_at'];?></td>
                        <td role="cell" data-label="Updated At"><?=$row['updated_at'];?></td>
                        <td role="cell" data-label="">
                            <?php 
                                if($row['status'] == 1){ $class = 'success'; $icon = 'pause'; $title='Deactivate';} 
                                else { $class = 'warning'; $icon = 'play'; $title='Activate'; }
                            ?>     
                            <a href="panel/content/status/<?=$row['id'];?>" title="<?=$title;?>" class="btn btn-sm btn-<?=$class;?> rounded-0">
                                <i class="bi bi-<?=$icon;?>"></i>
                            </a>

                            <a href="panel/content/edit/<?=$row['id'];?>" class="btn btn-sm btn-primary rounded-0">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            
                            <a onclick="return confirm('Are you sure you want to delete?')" href="panel/content/remove/<?=$row['id'];?>" class="btn btn-sm btn-danger rounded-0">
                                <i class="bi bi-x-circle"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php if(empty($contents['data'])){
                echo '<h4>There are no content yet.</h4>';
            } ?>
            
            <?=$contents['navigation'];?>
            <?=$_SESSION['csrf']['input'];?>

            <div><?=$this->addLayer('app/views/panel/footer');?></div>
        </form>
    </div>
</body>
</html>
