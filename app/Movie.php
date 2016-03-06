<?php namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Log;

class Movie extends Model {

	//
	protected $table = 'movies';
	protected $fillable = ['name','path','cast','direction','duration','genre_id'];
	public $timestamps = false;

	public function setPathAttribute($path){

		Log::info($path);
		Log::info($path->getClientOriginalName());
		$name = (new \DateTime('now'))->format('Y_m_d_H_i_s_').$path->getClientOriginalName();
		Log::info($name);
		$this->attributes['path'] = $name;
		\Storage::disk('local')->put($name, \File::get($path));
	}
}
