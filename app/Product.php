<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
 use SoftDeletes;

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
