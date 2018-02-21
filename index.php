<?php
require('helpers.php');
require('logic.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Who Owes What?</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-4">
                <h3>Who Owes What?</h3>

                <p>This is a simple app to split a bill.</p>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-4">
                <form method="GET" action="index.php">
                    <div class="form-group">
                        <label for="amount">What's the total amount?</label>

                        <div class="input-group">
                            <input type="number"
                                   class="form-control"
                                   id="amount"
                                   name="amount"
                                   placeholder="15.99"
                                   step="0.01"
                                   value="<?=$form->prefill('amount'); ?>">

                            <div class="input-group-append">
                                <span class="input-group-text">Euro</span>
                            </div>
                        </div>

                        <small class="form-text text-muted">This field is required.</small>
                    </div>

                    <div class="form-group">
                        <label for="number-of-people">How many are paying?</label>

                        <input type="number"
                               class="form-control"
                               id="number-of-people"
                               name="number-of-people"
                               placeholder="3"
                               value="<?=$form->prefill('number-of-people'); ?>">

                        <small class="form-text text-muted">This field is required.</small>
                    </div>

                    <div class="form-group">
                        <label for="tip">How was the service?</label>

                        <select class="form-control" id="tip" name="tip">
                            <option value="0.25" <?= $form->get('tip') == '0.25' ? 'selected' : ''; ?>>
                                Excellent (25% Tip)
                            </option>
                            
                            <option value="0.15" <?= $form->get('tip') == '0.15' ? 'selected' : ''; ?>>
                                Good (15% Tip)
                            </option>
                            
                            <option value="0.05" <?= $form->get('tip') == '0.05' ? 'selected' : ''; ?>>
                                Poor (5% Tip)
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox"
                                   class="form-check-input"
                                   id="round-up"
                                   name="round-up"
                                   <?= $form->has('round-up') ? 'checked' : ''; ?>>

                            <label class="form-check-label" for="round-up">Want me to round up?</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Calculate!</button>
                </form>
            </div>
        </div>

        <?php if ($form->hasErrors) : ?>
            <div class="row mt-5 justify-content-center">
                <div class="col-4">
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <!-- Maybe not necessary to sanitize this, but for the sake of completeness I do. -->
                                <li><?=sanitize($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($result) : ?>
            <div class="row mt-5 justify-content-center">
                <div class="col-4">
                    <div class="alert alert-success">
                        <!-- Maybe not necessary to sanitize this, but for the sake of completeness I do. -->
                        <?=sanitize($result); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
