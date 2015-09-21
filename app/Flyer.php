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
 * Scope query to throw those located at a given address
 * @param  Builder $query  
 * @param  string $zip    
 * @param  string $street 
 * @return Builder
 */
	public function scopeLocatedAt($query, $zip, $street)
	{
		$street = str_replace('-', ' ', $street);

		return $query->where(compact('zip', 'street'));
	}

	public function getPriceAttribute($price)
	{
		return '$'.number_format($price);
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
