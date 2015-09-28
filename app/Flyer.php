<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
/**
 * Fillable fields for a flyer
 *
 * @var array
 * 
 **/


	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];

/**
 * Find the flyer at the given address
 * @param  string $zip    
 * @param  string $street 
 * @return Builder
 */
	public static function LocatedAt($zip, $street)
	{
		$street = str_replace('-', ' ', $street);

		return static::where(compact('zip', 'street'))->first();
	}

	public function getPriceAttribute($price)
	{
		return '$'.number_format($price);
	}

	public function addPhoto(Photo $photo)
	{
		return $this->photos()->save($photo);
	}

	/**
	*
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function photos()
	{
		return $this->hasMany('App\Photo');
	}
}