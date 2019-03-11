$(document).ready(
    function showIncome() {
        $.ajax({
            method: "POST",
            url: "requests.php",
            data: { table: "income",
                    sort : "ASC"}
        })
        .done(function( response ) {
            console.log (response);
            $('#tableIncome').html(response);
        });
    }
);
$(document).ready(
    function showExpense() {
        $.ajax({
            method: "POST",
            url: "requests.php",
            data: { table: "expense",
                sort : "ASC"}
        })
            .done(function( response ) {
                $('#tableExpense').html(response);
            });
    }
);

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
        $('#tableIncome tbody').html('');
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
            $('#tableExpense').html('');
            $('#tableExpense').html(response);
        });
}