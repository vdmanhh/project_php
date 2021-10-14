<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'category_id',
        'subsubcategory_name_en',
        'subsubcategory_name_hin',
        'subsubcategory_slug_en',
        "subsubcategory_slug_hin"
    ];

   
}
