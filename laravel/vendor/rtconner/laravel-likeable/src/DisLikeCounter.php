<?php namespace Conner\Likeable;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DisLikeCounter extends Eloquent {

	protected $table = 'likeable_like_counters';
	public $timestamps = false;
	protected $fillable = ['dislikable_id', 'dislikable_type', 'count'];
	
	public function dislikable()
	{
		return $this->morphTo();
	}
	
}