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
        inc         =    parseInt(inc);
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
        var exp, expCat, expDate;
        exp     =   $("#inputExpense").val();
        exp     =   parseInt (exp);
        expCat  =   $("#inputExpenseCat").val();
        expDate =   $("#inputExpenseDate").val();


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

