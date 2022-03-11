<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    protected $fillable = [ 'title', 'project_link', 'coder', 'overview', 'image_path' ];
}
