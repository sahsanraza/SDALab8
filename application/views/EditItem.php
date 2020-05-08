<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Manage Item</title>
</head>

<body style="margin-left: 40%">
<div class="container mt-5">
    <div class="row ">
    <?php echo form_open('Item/EditItem/'.$Item['ItemID']); ?>
                <div class="form-group">
                    <?php echo form_label('Item Name', 'ItemName') ?>
                    <!-- <label for="ItemName">Item Name</label> -->
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'ItemName',
                        'name' => 'ItemName',
                        'value' => $Item['ItemName']
                    );
                    echo form_input($data);
                    ?>
                    <!-- <input type="text" class="form-control" id="ItemName" placeholder="Item name here"> -->
                </div>
                <div class="form-group">
                    <?php echo form_label("Price", "PPrice") ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'PPrice',
                        'name' => 'PPrice',
                        'value' => $Item['Price']
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Quantity', 'Quantity') ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'Quantity',
                        'name' => 'Quantity',
                        'value' => $Item['Quantity']
                    );
                    echo form_input($data);
                    ?>

                </div>
                <div class="form-group">
                    <?php echo form_label('Description', 'Desc') ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'Desc',
                        'name' => 'Desc',
                        'value' => $Item['ItemDescription']
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    $array = array(
                        'Name' => 'Update Item',
                        'class' => 'btn btn-outline-secondary btn-block',
                        'value' => 'Update Item',
                    );
                    echo form_submit($array);
                    ?>
                </div>
                <?php echo validation_errors('<p class="alert alert-danger">'); ?>
                <?php echo form_close(); ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>