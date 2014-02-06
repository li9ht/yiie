<?php

namespace frontend\models;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property integer $state_id
 * @property integer $city
 * @property string $zip
 * @property integer $country_id
 * @property string $phone
 */
class Profile extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'profile';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['first_name', 'last_name', 'address'], 'string'],
			[['state_id', 'city', 'country_id'], 'integer'],
			[['zip', 'phone'], 'string', 'max' => 20]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address' => 'Address',
			'state_id' => 'State ID',
			'city' => 'City',
			'zip' => 'Zip',
			'country_id' => 'Country ID',
			'phone' => 'Phone',
		];
	}
}
