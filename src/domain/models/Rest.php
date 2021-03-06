<?php

namespace yii2tool\restclient\domain\models;

use yii\db\ActiveRecord;
use yii2lab\db\domain\behaviors\serialize\SerializeBehavior;
use yii2lab\db\domain\helpers\TableHelper;

class Rest extends ActiveRecord
{
	
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return TableHelper::getGlobalName('rest_collection');
	}
	
	public function behaviors()
	{
		return [
			'rulesJson' => [
				'class' => SerializeBehavior::class,
				'attributes' => ['request'/*, 'response'*/],
			],
		];
	}
	
	public function fields() {
		$fields = parent::fields();
		$fields['response'] = function ($model) {
			return [];
		};
		return $fields;
	}
	
}
