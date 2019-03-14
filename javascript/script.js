$(document).ready (
    function(){
        $.ajax ({
            method  :   "POST",
            url     :   "requests.php",
            data    :   {
                table   :   "income",
                sort    :   "ASC",
                by      :   "cat"
            }
        }).done (function(response){
            $('#tableIncome').html(response);
        });
    }
);
$(document).ready(
    function(){
        $.ajax ({
            method  :   "POST",
            url     :   "requests.php",
            data    :   {
                table   :   "expense",
                sort    :   "ASC",
                by      :   "cat"
            }
        }).done (function(response){
            $('#tableExpense').html(response);
        });
    }
);

    function income() {
        var inc     =    $("#inputIncome").val();
        var incCat  =    $("#inputIncomeCat").val();
        var incDate =    $("#inputIncomeDate").val();

        $.ajax({
            method  :    "POST",
            url     :    "requests.php",
            data    :    {
                table   :   "income",
                amount  :   inc,
                cat     :   incCat,
                date    :   incDate
            }
        }).done(function(response) {
            $('#inputIncome, #inputIncomeCat, #inputIncomeDate').val('');
            $('#tableIncome tbody').html('');
            $('#tableIncome').html(response);
        });
    }

    function expense() {
        var exp     =   $("#inputExpense").val();
        var expCat  =   $("#inputExpenseCat").val();
        var expDate =   $("#inputExpenseDate").val();

        $.ajax({
            method  :   "POST",
            url     :   "requests.php",
            data    :   {
                table   :   "expense",
                amount  :   exp,
                cat     :   expCat,
                date    :   expDate
            }
        }).done(function(response) {
            $('#inputExpense, #inputExpenseCat, #inputExpenseDate').val('');
            $('#tableExpense tbody').html('');
            $('#tableExpense').html(response);
        });
    }

var container = document.getElementById('form');
container.onclick = function (event) {
    if (event.target.tagName === 'BUTTON') {
        alert('Вы кликнули по кнопке, с id ' + event.target.id);
    }
}
