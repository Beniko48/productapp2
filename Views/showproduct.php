<?php
require '../Templates/headers.php';
?>

<script src="../Scripts/show_product.js"></script>
</head>
<body>

<div id="delete-product-alert" class="alert alert-warning" role="alert", style="display: none">
    Product has been deleted!
</div>

<div class="show-product-title">
        <div class="row">
            <div class="col-md-9">
                Product List
            </div>
            <div class="col-md-1">
                <button id="product_save_return_btn" class="btn btn-secondary btn-block">Save</button>
            </div>
            <div class="col-md-2">
                <button id="mass_delete_btn" class="btn btn-danger btn-block">Mass Delete</button>
            </div>

        </div>
</div>
    <hr class="line">

<div class="show-product-container">
    <table id="product_tbl" class="table table-borderless">


        <tbody>

        </tbody>
    </table>


</div>

<?php
require '../Templates/footer.php';
?>
