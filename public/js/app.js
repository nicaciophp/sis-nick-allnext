function insertOrder(){
    var product = $("#product_id").val();
    var amount = $("#amount").val();

    $(".order").append("<input type='text' value='"+product+"' name='product_id[]'>");
    $(".order").append("<input type='text' value='"+amount+"' name='amount[]'>");

}
