/*$(document).ready(
        function showTable() {
            $.ajax({
                method: "POST",
                url: "requests.php",
                data: { request: "table" }
            })
            .done(function( response ) {
                console.log (response);
                $('#table').html(response);
            });
        }
    );*/

function  income() {
    var inc = $("#inputIncome").val();
    var incCat = $("#inputIncomeCat").val();
    var incDate = $("#inputIncomeDate").val();

    $.ajax({
        method: "POST",
        url: "requests.php",
        data: {
            income  : inc,
            cat     : incCat,
            date    : incDate
        }
    }).done(function( response ) {
        $('#inputIncome, #inputIncomeCat, #inputIncomeDate').val('');
        $('#tableIncome').html(response);
    });
}

function expense() {
    var exp = $("#inputExpense").val();
    var expCat = $("#inputExpenseCat").val();
    var expDate = $("#inputExpenseDate").val();

    $.ajax({
        method: "POST",
        url: "requests.php",
        data: {
            expense : exp,
            cat     : expCat,
            date    : expDate
        }
    }).done(function( response ) {
            $('#inputExpense, #inputExpenseCat, #inputExpenseDate').val('');
            $('#tableIncome').html(response);
        });
}