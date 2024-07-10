<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'document_type_id',
        'price'
    ];

    public function rentals(){
        return $this->hasMany(Rental::class);
    }

    public function discount(){
        $recentlyRented = $this->rentals()->where('rented_at','>=',now()->subHours(48))->exists();
        if(!$recentlyRented){
            return true;
        }
    }

    public function bookType(){
        return $this->belongsTo(DocumentType::class);
    }

}
