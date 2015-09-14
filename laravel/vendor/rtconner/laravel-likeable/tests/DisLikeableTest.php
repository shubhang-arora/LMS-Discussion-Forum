<?php

use Mockery as m;
use Conner\Likeable\DisLikeableTrait;

class TaggingTest extends PHPUnit_Framework_TestCase {

	public function tearDown()
	{
		m::close();
	}
	
	public function testLike()
	{
		$dislikable = m::mock('DisLikeableStub[incrementLikeCount]');
		$dislikable->shouldReceive('incrementDisLikeCount')->andReturn(null);
		
		$dislikable->dislike(0);
	}
	
	public function testUndislike()
	{
		$dislikable = m::mock('DisLikeableStub[decrementDisLikeCount]');
		$dislikable->shouldReceive('decrementDisLikeCount')->andReturn(null);
		
		$dislikable->undislike(0);
	}
	
}

class LikeableStub extends \Illuminate\Database\Eloquent\Model {
	use DisLikeableTrait;

	public function incrementDisLikeCount() {}
	public function decrementDisLikeCount() {}
}