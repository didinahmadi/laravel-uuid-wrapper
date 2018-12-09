<?php
namespace UuidWrapper;

use Webpatser\Uuid\Uuid;

trait UuidWrapper {

	public static function generateUuid()
	{
		return Uuid::generate();
	}

	public static function bootUuid()
	{
		self::creating(function($model) {
			$model->id = self::generateUuid();
		});
	}

}