<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $dates=['deleted_at'];

    protected $fallible =[
        'productName',
        'modelNo',
        'productBrief',
        'productDescription',
        'productPrice',
        'quantity',
        'condition',
        'productFile',
        'productFile1',
        'productFile2',
        'productFile3',
    ];
}
