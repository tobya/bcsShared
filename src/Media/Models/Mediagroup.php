<?php

namespace Tobya\BCS\Shared\Media\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediagroup extends Model
{
    use HasFactory;
  protected $fillable = ['name'];
    public function MediaLinks(){
        return $this->hasMany(Medialink::class);
    }
}
