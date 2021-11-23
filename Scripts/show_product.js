$(document).ready(function () {
    fetchTbl();

    $('#mass_delete_btn').click(function () {
        let productIDsArray = new Array();
        let dvdIDsArray = new Array();
        let furnitureIDsArray = new Array();
        let bookIDsArray = new Array();
        $("input:checkbox[class=select-area]:checked").each(function () {
            //let element = $(this).val();
            // console.log(`element = ${element}`);
            let element = JSON.parse($(this).val());
            productIDsArray.push(element.productID);
            if (element.DVDID !== null)
                dvdIDsArray.push(element.DVDID);
            if (element.furnitureID !== null)
                furnitureIDsArray.push(element.furnitureID);
            if (element.bookID !== null)
                bookIDsArray.push(element.bookID);
        });
        if (productIDsArray.length) {
            if(confirm("Are you sure?")) {

                const postData = {
                    productIDsArray: productIDsArray,
                    dvdIDsArray: dvdIDsArray,
                    furnitureIDsArray: furnitureIDsArray,
                    bookIDsArray: bookIDsArray
                };
                $.post('../Controllers/DeleteProduct.php', postData, function (res) {
                    //console.log(res);
                    let info = JSON.parse(res);
                    if(info.status === 'ok') {
                        fetchTbl();
                        $("#delete-product-alert").show('slow');
                        setTimeout(function () {
                            $("#delete-product-alert").hide('slow');
                        }, 3000);
                    }
                    else{
                        console.log(info.message);

                    }

                })
            }
        }
    });

    function fetchTbl() {
        $.get('../Controllers/ShowProduct.php', function (res) {
            //  console.log(res);
            let col = 1;
            let template = ``;
            JSON.parse(res).forEach(item => {
                //  console.log(item);
                if (col === 1)
                    template += `<tr>`;

                template += `<td>`;
                template += `<fieldset>`;
                template += `
               
               <p> <input  class="select-area"  type="checkbox" value='${JSON.stringify(item)}'>  </p>
               <br>
               
                <p>SKU: ${item.SKU}</p>
                <p>Name: ${item.name}</p>
                <p>Price: ${item.price}</p>
                `;
                if (item.DVDID !== null)
                    template += `<p>MB: ${item.MB}</p>`;
                if (item.furnitureID !== null)
                    template += `<p>dimensions: ${item.width}X${item.height}X${item.length}</p>`;
                if (item.bookID !== null)
                    template += `<p>KG: ${item.KG}</p>`;

                template += `</fieldset>`;
                template += `</td>`;
                if (col === 4) {
                    template += `</tr>`
                    col = 0;
                }
                col++;

            });
            $('#product_tbl tbody').html(template);
        })

    }

})