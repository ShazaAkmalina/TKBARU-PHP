<?php
/**
 * Created by PhpStorm.
 * User: Sugito
 * Date: 9/10/2016
 * Time: 12:08 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Stocks
 *
 * @mixin \Eloquent
 */
class Stocks extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = '';

    protected $fillable = [

    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->created_by = $user->id;
                $model->updated_by = $user->id;
            }
        });

        static::updating(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->updated_by = $user->id;
            }
        });

        static::deleting(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->deleted_by = $user->id;
                $model->save();
            }
        });
    }
}