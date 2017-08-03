<?php
/**
 * Created by PhpStorm.
 * User: Monika
 * Date: 8/3/2017
 * Time: 10:24 AM
 */

namespace App\Models;


use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    /**
     * Automatically generates and adds UUID to model
     */
    protected static function boot() {
        parent::boot();
        static::creating(function($model) {
            if(!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }
}