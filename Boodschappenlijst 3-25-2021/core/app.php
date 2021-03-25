<?php

class app
{
	protected static $registry = [];

	public static function bind($key, $value)
	{
		static::$registry[$key] = $value;
	}

	public static function get($key)
	{
		if(!array_key_exists($key, static::$registry))
		{
			throw new Exception("{$key} does not exist.");
		}
			return static::$registry[$key];
	}
}