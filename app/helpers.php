<?php
/**
* Display a flash message
*
* @param string $title
* @param string $message
* @return void
**/

function flash($title = null, $message = null)
{
	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->info($title, $message);
}

/**
* Path to a given flyer
*
* @param App\Flyer $flyer
* @return string
**/

function flyer_path(App\Flyer $flyer)
{
	return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);
}

function link_to($body, $path, $type)
{
	if (is_object($path)) {
		$action = '/' . $path->getTable();

		if (in_array($type, ['PUT', 'PATCH', 'DELETE'])) {
			$action .= '/' . $path->getKey();
		}
	} else {
		$action = $path;
	}

	$csrf = csrf_field();
	return <<<EOT

		<form method="POST" action="{$action}">
			<input type='hidden' name='_method' value='{$type}'>
			$csrf
			<button type="submit">{$body}</button>

		</form>

EOT;
}