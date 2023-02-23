<!DOCTYPE html>
<html>



<head>
    <title>Transactions Observation</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    table tr th,
    table tr td {
        padding: 5px;
        border: 1px #eee solid;

    }

    tfoot tr th,
    tfoot tr td {
        font-size: 20px;
    }

    tfoot tr th {
        text-align: right;

    }
    </style>
</head>

<body >
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>


        <tbody>

            <?php if (!empty($transactions)) : ?>
            <?php foreach ($transactions as $transaction) : ?>

            <tr>


                <td><?= $transaction[0] ?></td>
                <td><?= $transaction[1] ?></td>
                <td><?= $transaction[2] ?></td>

                <?php if(str_replace(['$', ','], '', $transaction[3]) < 0) : ?>
                <td>
                    <span style="color:red">
                        <?=$transaction[3] ?> 
                    </span>
                </td>
                <?php else :  ?>
                <td>
                    <span style="color:green">
                        <?=$transaction[3] ?>
                    </span>
                </td>
                <?php endif ?>

            </tr>

            <?php endforeach ?>
            <?php endif ?>


        </tbody>

        
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <?= $total['Income'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <?= $total['Expense'] ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <?= $total['Net'] ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>