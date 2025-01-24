<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazines extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'title_zh',
      'title_en',
      'download_links',
      'img',
      'description',
      'tags',
      'update_time'
    ];
}
