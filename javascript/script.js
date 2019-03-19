$(document).ready (
    //get income table
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
    //get expense table
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
        // insret  into income
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
        // insret  into expense
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

function del(id , cla) {
        //delete the row
    var id      = id; //id element
    var cla     = cla; // tableName by element
    console.log (id , cla);
    $.ajax({
        method  :   "POST",
        url     :   "requests.php",
        data    :   {
            id   :   id,
            cla  :   cla,
        }
    }).done (function(response){
        if (cla == "income") {
            $('#tableIncome').html(response);
        } else if (cla == "expense") {
            $('#tableExpense').html(response);
        }
    });
}