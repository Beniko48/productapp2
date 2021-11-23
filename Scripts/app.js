$(document).ready(function () {
   console.log('jquery works');
   $('#show_save_product').click(function () {
       window.location.href = "http://localhost/websites/Scandiweb/App/Views/newproduct.php";
   });
   /*  product_cancel_btn */
    $('#product_cancel_btn').click(function () {
        window.location.href = "http://localhost/websites/Scandiweb/App/Views/index.php";
    });
    /*show_product_list*/

    $('#show_product_list').click(function () {
        window.location.href = "http://localhost/websites/Scandiweb/App/Views/showproduct.php";
    });

    $('#product_save_return_btn').click(function () {
        window.location.href = "http://localhost/websites/Scandiweb/App/Views/newproduct.php";
    });
});