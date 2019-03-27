<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Favourite;

trait Favouritable
{
    protected static function bootFavouritable()
    {
        static::deleting(function($model){
            $model->favourites->each->delete();
        });
    }
   
   public function favourites()
    {
        return $this->morphMany(Favourite::class, 'favourited');
    }

    public function favourite()
    {
        $this->favourites()->create(['user_id' => auth()->id()]);
    }

    public function unfavourite()
    {
        $attributes = ['user_id' => auth()->id()];
        $this->favourites()->where($attributes)->get()->each->delete();
    }

    public function isFavourited()
    {
        return !! $this->favourites()->where('user_id', auth()->id())->count();
    }

    public function getIsFavouritedAttribute()
    {
        return !! $this->favourites()->where('user_id', auth()->id())->count();
    }

    public function getFavouritesCountAttribute()
    {
        return $this->favourites->count();
    }

}