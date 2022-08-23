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
                    <table class="table table-sm  table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    CryptoCurrency
                                </th>
                                <th>
                                    USD
                                </th>
                                <th>
                                    RUB
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($response['status'])) : ?>
                                <?php foreach ($response['data'] as $data) : ?>
                                    <tr>
                                        <td>
                                            <?= $data['symbol'] ?>
                                        </td>

                                        <td>
                                            <?= $data['quote']['USD']['price'] ?>
                                        </td>

                                        <td>
                                            <?= $data['quote']['RUB']['price'] ?>
                                        </td>
                                    </tr>


                                <?php endforeach ?>

                            <?php endif ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
</body>

</html>