<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
class Post extends Model
{   
    
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'status', 'file', 'views' ,'category_id', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function meta(){
    	return $this->hasOne(Meta::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function publicity(){
        return $this->hasOne(Publicity::class);
    }

    public function getPostStatusAttribute(){
        
        if($this->status == 'DRAFT'){
            return $this->status = 'Borrador';
        }else{
            return $this->status = 'Publicado';
        }
    }

    public function getIfExistCategoryNameAttribute(){
        
       if($this->category)
            return $this->category->name;

        return 'Sin categoria';
    }

    public function getDateFormatAttribute(){
        Date::setLocale('es');
        $date = Date::parse($this->created_at);
        return ucwords($date->format('F j, Y'));
    }


    
    
   
}
