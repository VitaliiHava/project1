$(document).ready(
  console.log("Document Ready")
);


$(document).ready(function showTable() {
    $.ajax({
        method: "POST",
        url: "requests.php",
        data: { request: "table" }
    })
        .done(function( response ) {
            console.log (response);
            $('#table').html(response);
        });
});

function  income() {
    var inc = $("#inputIncome").val();
    //console.log("Доход: "+val);
    $.ajax({
        method: "POST",
        url: "requests.php",
        data: { income: inc }
    })
        .done(function( response ) {
            console.log (response);
            $('#inputIncome').val('');
            $('#tableIncome').html(response);
        });
}

function expense() {
    znak = $("#inputExpense").val();
    //console.log ("Расход: "+val);
    $.ajax({
        method: "POST",
        url: "requests.php",
        data: { expense: znak }
    })
        .done(function( response ) {
            console.log (response);
            $('#inputExpense').val('');
            $('#tableIncome').html(response);
        });
}