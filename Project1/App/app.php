<?php

function getTransactionsFiles(string $dirpath)
{
    $files = [];

    foreach(scandir($dirpath) as $file)
    {
        if(!is_dir($file))
        {
            $files[] = $dirpath.$file;
        }
    }

    return $files;
}

function getTransactions(string $transactionFilePath)
{
    if(!file_exists($transactionFilePath))
    {
        echo "file doesn't exist";
    }
    else
    {
        $file = fopen($transactionFilePath, 'r');
        $transactions = [];
        while(($transaction = fgetcsv($file))!=false)
        {
            if($transaction != null)
            {
                $transactions[] = $transaction;
            }
        }
        return $transactions;
    }
}
function CalculateTotal($transactions)
{
    $total = ['Income'=>0, 'Expense'=>0, 'Net'=>0];
    foreach($transactions as $transaction)
    {
        $amount = str_replace(['$', ','], '', $transaction[3]);
        if($amount > 0)
        {
            $total['Income'] += $amount;
        }
        else
        {
            $total['Expense'] += $amount;
        }

    }
    $total['Net'] =  $total['Income'] + $total['Expense'];
    return $total;
}

/*
    Ideas to develope
    $files = [];
    foreach(scandir($dirpath) as $file)
    {
        if(is_dir($file))
        {
            $files = array_merge($files, getTransactionsFiles($dirpath.$file));

        }
        else
        {
            $files[] = $dirpath.$file;
        }
    }
    return $files;



    while(!feof($file))
        {
            $transaction = fgetcsv($file);
            $transactions[] = $transaction;
        }

    
    

*/
?>
