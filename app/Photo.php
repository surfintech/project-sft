<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table ='flyer_photos';

    protected $fillable = ['name', 'path', 'thumbnail_path'];

    /**
     * A photo belongs to a flyer.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }



    public function baseDir()
    {
        return 'images/photos';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->path = $this->baseDir() . '/' . $name;
        $this->thumbnail_path = $this->baseDir() . '/tn-' . $name;


    }

    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
            ]);
        
        parent::delete();
    }

}
