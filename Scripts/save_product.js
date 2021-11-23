$(document).ready(function () {
    $('#select_type_txt').change(function () {
        let elem = $(this).val();
        // console.log(`elem = ${elem}`);
        let template = ``;
        switch (elem) {
            case 'dvd':
                template = `
                    <div class="row mt-2">
                        <div class="col-md-1">MB: </div>
                        <div class="col-md-2">
                            <input id="mb_txt" type="text" class="form-control">
                        </div>
                        <div id="mb_messages" class="col-md-3"></div>
                    </div>
                `;
                break;


            case 'furniture':
                template = `
                    <div class="row mt-2">
                        <div class="col-md-1">Width: </div>
                        <div class="col-md-2">
                            <input id="width_txt" type="text" class="form-control">
                        </div>
                        <div id="width_messages" class="col-md-3"></div>
                    </div>
                    
                    <div class="row mt-2">
                        <div class="col-md-1">Height: </div>
                        <div class="col-md-2">
                            <input id="height_txt" type="text" class="form-control">
                        </div>
                        <div id="height_messages" class="col-md-3"></div>
                    </div>
                    
                    <div class="row mt-2">
                        <div class="col-md-1">Length: </div>
                        <div class="col-md-2">
                            <input id="length_txt" type="text" class="form-control">
                        </div>
                        <div id="length_messages" class="col-md-3"></div>
                    </div>
                `;
                break;


            case 'book':
                template = `
                    <div class="row mt-2">
                        <div class="col-md-1">KG: </div>
                        <div class="col-md-2">
                            <input id="kg_txt" type="text" class="form-control">
                        </div>
                        <div id="kg_messages" class="col-md-3"></div>
                    </div>
                `;
                break;

            default :
                template = ``;
                break;

        }
        $('#subform').html(template);
    });


    function cst_trim(txt) {
        if (txt === undefined || txt.trim() === '')
            return null;
        return txt.trim();
    }


    function validate_sku(txt) {
        return txt !== null && txt !== '' && txt.length >= 3 && txt.length <= 20;
    }

    function validate_name(txt) {
        return txt !== null && txt !== '' && txt.length > 0 && txt.length <= 30;
    }

    function validate_price(txt) {
        return txt !== null && txt !== '' && !isNaN(txt) && !isNaN(parseFloat(txt) && !isNaN(parseFloat(txt) - 0));
    }

    function validate_product_type(txt) {
        return txt !== '-1';
    }

    function validate_mb(txt, product_type) {
        return product_type === 'furniture' || product_type === 'book' ||
            txt !== null && txt !== '' && product_type === 'dvd' &&
            !isNaN(txt) && !isNaN(parseFloat(txt) &&
                !isNaN(parseFloat(txt) - 0));
    }

    function validate_width(txt, product_type) {
        return product_type === 'dvd' || product_type === 'book' ||
            txt !== null && txt !== '' && product_type === 'furniture' &&
            !isNaN(txt) && !isNaN(parseFloat(txt) &&
                !isNaN(parseFloat(txt) - 0));
    }

    function validate_height(txt, product_type) {
        return product_type === 'dvd' || product_type === 'book' ||
            txt !== null && txt !== '' && product_type === 'furniture' &&
            !isNaN(txt) && !isNaN(parseFloat(txt) && !isNaN(parseFloat(txt) - 0));
    }

    function validate_length(txt, product_type) {
        return product_type === 'dvd' || product_type === 'book' ||
            txt !== null && txt !== '' && product_type === 'furniture' && !isNaN(txt) &&
            !isNaN(parseFloat(txt) && !isNaN(parseFloat(txt) - 0));
    }

    function validate_kg(txt, product_type) {
        return product_type === 'dvd' || product_type === 'furniture' ||
            txt !== null && txt !== '' && product_type === 'book' && !isNaN(txt) &&
            !isNaN(parseFloat(txt) && !isNaN(parseFloat(txt) - 0));
    }


    function validate_form(sku, name, price, product_type, mb, width, height, length, kg) {
        let isSKU = validate_sku(sku);
        let isName = validate_name(name);
        let isPrice = validate_price(price);
        let isProduct_type = validate_product_type(product_type);
        let isMb = validate_mb(mb, product_type);
        let isWidth = validate_width(width, product_type);
        let isHeight = validate_height(height, product_type);
        let isLength = validate_length(length, product_type);
        let isKg = validate_kg(kg, product_type);

        //UPDATE MESSAGES
        if (!isSKU)
            $('#sku_messages').html(`<h6 class="error">* Enter Valid SKU</h6>`);
        else
            $('#sku_messages').html(``);

        if (!isName)
            $('#name_messages').html(`<h6 class="error">* Enter Valid name</h6>`);
        else
            $('#name_messages').html(``);

        if (!isPrice)
            $('#price_messages').html(`<h6 class="error">* Enter Valid Price</h6>`);
        else
            $('#price_messages').html(``);

        if (!isProduct_type)
            $('#product_type_messages').html(`<h6 class="error">* PLease Select</h6>`);
        else
            $('#product_type_messages').html(``);

        if (!isMb)
            $('#mb_messages').html(`<h6 class="error">* Enter Valid MB</h6>`);
        else
            $('#mb_messages').html(``);

        if (!isWidth)
            $('#width_messages').html(`<h6 class="error">* Enter Valid Width</h6>`);
        else
            $('#width_messages').html(``);

        if (!isHeight)
            $('#height_messages').html(`<h6 class="error">* Enter Valid Height</h6>`);
        else
            $('#height_messages').html(``);

        if (!isLength)
            $('#length_messages').html(`<h6 class="error">* Enter Valid Length</h6>`);
        else
            $('#length_messages').html(``);
        if (!isKg)
            $('#kg_messages').html(`<h6 class="error">* Enter Valid KG</h6>`);
        else
            $('#kg_messages').html(``);
        // UPDATE MESSAGES END
        return isSKU && isName && isPrice && isProduct_type && isMb && isWidth && isHeight && isLength && isKg;
    }


    $('#product_save_btn').click(function () {
        let sku = cst_trim($('#sku_txt').val());
        let name = cst_trim($('#name_txt').val());
        let price = cst_trim($('#price_txt').val());
        let product_type = $('#select_type_txt').val();
        let mb = cst_trim($('#mb_txt').val());
        let width = cst_trim($('#width_txt').val());
        let height = cst_trim($('#height_txt').val());
        let length = cst_trim($('#length_txt').val());
        let kg = cst_trim($('#kg_txt').val());
        /*   console.log(`sku = ${sku}`);
           console.log(`name = ${name}`);
           console.log(`price = ${price}`);
           console.log(`product_type = ${product_type}`);
           console.log(`mb = ${mb}`);
           console.log(`width = ${width}`);
           console.log(`height = ${height}`);
           console.log(`length = ${length}`);
           console.log(`kg = ${kg}`);*/

        if (validate_form(sku, name, price, product_type, mb, width, height, length, kg)) {
            const postData = {
                sku: sku,
                name: name,
                price: price,
                product_type: product_type,
                mb: Number.parseFloat(mb).toFixed(2),
                width: Number.parseFloat(width).toFixed(2),
                height: Number.parseFloat(height).toFixed(2),
                length: Number.parseFloat(length).toFixed(2),
                kg: Number.parseFloat(kg).toFixed(2),

            };
            $.post('../Controllers/SaveProduct.php', postData, function (res) {
               // console.log(res);
                let info = JSON.parse(res);
                if(info.status === 'ok') {
                    $("#save-product-alert").show('slow');
                    setTimeout(function () {
                        $("#save-product-alert").hide('slow');
                    }, 3000);
                    $('#product-registration').trigger('reset');
                    $("#select_type_txt").val("-1");
                    $('#subform').html('');

                }
                else {
                    console.log(info.message);
                }
            })
        };


    });
});