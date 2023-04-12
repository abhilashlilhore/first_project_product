function add_more() {

    var a = $("#autoincriment").val();
    // alert();

    var product = '<div class="row" id="test'+a+'"> <div class="col-xl-2"> <div class="form-group"> <label class="sr-only" >Image</label> <input class="form-control" name="image[]" type="file" onchange="document.getElementById('+a+').src = window.URL.createObjectURL(this.files[0])" required> <img id="'+a+'" alt="your image" width="100" height="100" /> </div> </div> <div class="col-xl-2"> <div class="form-group"> <label class="sr-only" >Title</label> <input type="" class="form-control" placeholder="Enter Title" name="title[]" required> </div> </div> <div class="col-xl-4"> <div class="form-group"> <label class="sr-only" for="pwd">Description</label> <textarea name="description[]" id="" class="form-control" placeholder="Description field should not allow more than 250 characters" required maxlength="250"></textarea> </div> </div> <div class="col-xl-1"> <div class="form-group"> <label class="sr-only" for="pwd">Quantity</label> <input type="number" class="form-control" placeholder="Enter Quantity" name="qty[]" min="0" required> </div> </div> <div class="col-xl-2"> <div class="form-group"> <label class="sr-only" for="pwd">Price</label> <input type="number" step="any" min="0" class="form-control" placeholder="Enter Price" name="price[]" required><input type="date" class="form-control" placeholder="Enter Date" name="date[]" required > </div> </div> <div class="col-xl-1"> <button type="button" class="btn btn-default" onclick="add_more_remove('+a+')" title="Remove Product">-</button> </div> </div>';

    $("#more_product").append(product);
var b=Number(a)+1;
    $("#autoincriment").val(b);


}
function add_more_remove(ddd) {
    // alert(ddd);
    $("#test" + ddd).remove();
}




$(document).ready(function (abc1) {

    $("#catnm").on('submit', (function (abc1) {
        // alert();       

        abc1.preventDefault();

       

        $.ajax({
            url: "php/add_product.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                // alert(data);

                $("#getdata").html(data);

                // show_product()
            },

            error: function () {
                alert('error');
            }
        });
    }));
});


