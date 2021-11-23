<?php
require '../Templates/headers.php';
?>

<script src="../Scripts/save_product.js"></script>
</head>
<body>

<div id="save-product-alert" class="alert alert-primary" role="alert", style="display: none">
    Product has been successfully added!
</div>

<div class="save-product-title">
    <div class="row">
        <div class="col-md-10">
            Product Save
        </div>
        <div class="col-md-1">
            <button id="product_cancel_btn" class="btn btn-secondary btn-block">Cancel</button>
        </div>
        <div class="col-md-1">
            <button id="product_save_btn" class="btn btn-success btn-block">Save</button>
        </div>

    </div>
</div>

<hr class="line">
<form id="product-registration">
    <div class="row">
        <div class="col-md-1">SKU: </div>
        <div class="col-md-2">
            <input id="sku_txt" type="text" class="form-control">
        </div>
        <div id="sku_messages" class="col-md-3"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-1">Name: </div>
        <div class="col-md-2">
            <input id="name_txt" type="text" class="form-control">
        </div>
        <div id="name_messages" class="col-md-3"></div>
    </div>

    <div class="row mt-2">
        <div class="col-md-1">Price: </div>
        <div class="col-md-2">
            <input id="price_txt" type="text" class="form-control">
        </div>
        <div id="price_messages" class="col-md-3"></div>
    </div>

    <div class="row mt-3">
        <div class="col-md-1">
            Product Type:
        </div>

        <div class="col-md-2">
            <select  id="select_type_txt">
                <option value="-1">--Please select type--</option>
                <option value="dvd">DVD</option>
                <option value="furniture">Furniture</option>
                <option value="book">Book</option>
            </select>
        </div>
        <div id="product_type_messages" class="col-md-3">

        </div>
    </div>
    <div id="subform" class="mt-3"></div>
</form>

<?php
require '../Templates/footer.php';
?>
