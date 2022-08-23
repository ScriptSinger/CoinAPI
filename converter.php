<?php
include_once('lib/curl.php');
include_once('init.php');
$c = Curl::app('https://rest.coinapi.io')
    ->add_headers([
        "X-CoinAPI-Key:" . API_KEY,
        'Accept: application/json; charset=utf-8',
    ]);
$data = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $c->request("/v1/exchangerate/{$_POST['currency_from']}/{$_POST['currency_to']}");
    $data = json_decode($data['html']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="content mt-5">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-primary">
                    <form class="form-horizontal mb-0" method="POST" action="">
                        <div class="card-header ">
                            <h3 class="card-title">Конвертер CoinAPI</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="currency_from" class="col-sm-2 col-form-label">Из</label>
                                <div class="col-sm-10">
                                    <input value="" name="currency_from" type="text" class="form-control " placeholder="BTC" id="currency_from">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="currency_to" class="col-sm-2 col-form-label">В</label>
                                <div class="col-sm-10">
                                    <input value="" name="currency_to" type="text" class="form-control  " id="currency_to" placeholder="USD">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Расчет</button>
                        </div>

                    </form>
                </div>
                <?php if ($data != null) : ?>
                    <div class="alert alert-success mt-5" role="alert">
                        <?= 1 . $data->asset_id_base . '=' . $data->rate . $data->asset_id_quote   ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
</body>

</html>