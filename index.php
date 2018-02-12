<?php

require('BillSplitter.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Split My Bill</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Split My Bill</h3>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <form method="POST" action="http://p2.loc">
                    <div class="form-group">
                        <label for="amount">What's the total amount?</label>
                        
                        <div class="input-group">
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="15.99">

                            <div class="input-group-append">
                                <span class="input-group-text">Euro</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number-of-people">How many are paying?</label>

                        <input type="number" class="form-control" id="number-of-people" name="number-of-people" placeholder="3  ">
                    </div>

                    <div class="form-group">
                        <label for="tip">How was the service?</label>

                        <select class="form-control" id="tip" name="tip">
                            <option selected="true" value="0.25">Excellent (25% Tip)</option>
                            <option value="0.15">Good (15% Tip)</option>
                            <option value="0.05">Poor (5% Tip)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="round-up" name="round-up"></form>

                            <label class="form-check-label" for="round-up">Want me to round up?</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Calculate!</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
