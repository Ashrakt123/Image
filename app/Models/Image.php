<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable =['name','image'];
    protected $table="images";


    public function getImageUrlAttribute(){
     
            return ($this->image !== null)? asset('Storage/'.$this->image) : asset('storage/default/default.png');
    }

}
