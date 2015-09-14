<?php namespace Conner\Likeable;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DisLike extends Eloquent {

	protected $table = 'likeable_likes';
	public $timestamps = true;
	protected $fillable = ['dislikable_id', 'dislikable_type', 'user_id'];

	public function dislikable()
	{
		return $this->morphTo();
	}

}