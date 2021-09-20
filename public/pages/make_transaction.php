<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/libraries/bootstrap/css/bootstrap.min.css">

</head>
<body>
    <main class="container bg-gray">
        <div class="col-6 m-auto pt-5">
            <div class="row">
                <div class="col-12">
                <form method="POST">
                    <h3 class="pb-3 text-center pt-5"> Make new transaction</h3>
                    <div class="form-group pt-2">
                        <label for="transactionType">Transaction Type</label>
                        <select name="transactionType" id="transactionType" required class="form-control" size="2" >
                            <option value="Debit"> Debit</option>
                            <option value="Credit"> Credit</option>
                        </select>
                    </div>
                    <div class="form-group pt-2">
                        <label for="transactionAmount">Amount</label>
                        <input type="number" name="transactionAmount" required id="transactionAmount" placeholder="Transaction Amount" class="form-control">
                    </div>
                    <div class="form-group pt-2">
                        <button type="submit" name="btnMakeTransaction" class="btn btn-primary">Make transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>