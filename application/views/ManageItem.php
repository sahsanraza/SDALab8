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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php echo form_open(); ?>
                <div class="form-group">
                    <?php echo form_label('Item Name', 'ItemName') ?>
                    <!-- <label for="ItemName">Item Name</label> -->
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'ItemName',
                        'name' => 'ItemName',
                        'placeholder' => 'Item name here'
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
                        'placeholder' => 'Item price here'
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
                        'placeholder' => 'Item quantity here'
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
                        'placeholder' => 'Item description here'
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    $array = array(
                        'Name' => 'AddItem',
                        'class' => 'btn btn-outline-success btn-block',
                        'value' => 'Add Item',
                    );
                    echo form_submit($array);
                    ?>
                </div>
                <?php echo validation_errors('<p class="alert alert-danger">'); ?>
                <?php echo form_close(); ?>

                <?php if ($this->session->flashdata('padded')) : ?>
                    <div class="alert alert-success mt-3"><?php echo $this->session->flashdata('padded'); ?></div>

                <?php endif; ?>
                <?php if ($this->session->flashdata('errormsg')) : ?>
                    <div class="alert alert-danger mt-3"><?php echo $this->session->flashdata('errormsg'); ?></div>

                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php if (!empty($Items)) : $count = 1; ?>
                    <div class=" table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <td>Item No</td>
                                <td>Item Name</td>
                                <td>Price</td>
                                <td>
                                    Quantity
                                </td>
                                <td>
                                    Action
                                </td>
                            </thead>
                            <tbody>
                                <?php foreach ($Items as $Item) : ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $Item['ItemName'] ?></td>
                                        <td><?php echo $Item['Price'] ?></td>
                                        <td>
                                            <?php echo $Item['Quantity'] ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('Item/EditItem/' . $Item['ItemID']) ?>" class="btn btn-sm btn-primary"> Update</a>
                                            <a href="javascript:;" class="btn btn-sm btn-delete btn-danger" data-id="<?php echo $Item['ItemID'] ?>"> Delete</a>
                                        </td>
                                    </tr>
                                <?php $count++; endforeach;  ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                <?php endif;
                ?>
            </div>
        </div>
    </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script type="text/javascript"> 
        $('.btn-delete').on('click', function() {
            var id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    window.location.replace('<?php echo site_url("Item/DeleteItem/"); ?>' + id);
                }
            });
        });
    </script>   
</body>

</html>