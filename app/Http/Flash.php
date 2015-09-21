<?php

namespace App\Http;

class Flash 
{
	/**
	 * Create a flash message
	 * @param  string 		$title   
	 * @param  string 		$message 
	 * @param  string 		$level   Type of message to throw. Error, success, info etc
	 * @param  string|null 	$key     Session key to know whether or not to use an overlay or regular message window
	 * @return void
	 */
	public function create($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key, [
				'title' => $title, 
				'message' => $message, 
				'level' => $level,
			]);

	}
	public function info($title, $message)
	{
		return $this->create($title, $message, 'info');

	}
	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');

	}
	public function error($title, $message)
	{
		return $this->create($title, $message, 'error');

	}
	public function overlay($title, $message, $level = 'success')
	{
		return $this->create($title, $message, $level, 'flash_message_overlay');

	}	
}