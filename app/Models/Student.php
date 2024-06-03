<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name','nim','major','class','course_id'];

    /** 1 to 1
     * - hasOne(NamaModel)    : table saat ini meminjamkan key
     * - belongsTo(NamaModel) : table saat ini meminjamkan key dari table lain
     * 
     * 1 to M
     * - hasMany(NamaModel)      : table saat ini meminjam id
     * - belongsToMany(NamaModel): table saat ini meminjam id dari table lain
     */


    //mendefinisikan relasi ke mdoel course
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
