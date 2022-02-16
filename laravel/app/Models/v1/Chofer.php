<?php
 
namespace App\Models\v1;
 
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
 
class Chofer extends Model
{
    use HasUUID;

    protected $table = 'chofer';

    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';
}