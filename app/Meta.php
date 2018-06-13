<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{	

	protected $fillable = ['description', 'keywords', 'post_id'];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
