<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItCoursesItem extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'title',
      'dummy_download_links',
      'download_names',
      'download_links',
      'downcodes',
      'img',
      'description',
      'tags',
      'update_time'
    ];
}