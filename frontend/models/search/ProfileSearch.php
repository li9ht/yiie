<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Profile;

/**
 * ProfileSearch represents the model behind the search form about Profile.
 */
class ProfileSearch extends Model
{
	public $id;
	public $first_name;
	public $last_name;
	public $address;
	public $state_id;
	public $city;
	public $zip;
	public $country_id;
	public $phone;

	public function rules()
	{
		return [
			[['id', 'state_id', 'city', 'country_id'], 'integer'],
			[['first_name', 'last_name', 'address', 'zip', 'phone'], 'safe'],
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

	public function search($params)
	{
		$query = Profile::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'first_name', true);
		$this->addCondition($query, 'last_name', true);
		$this->addCondition($query, 'address', true);
		$this->addCondition($query, 'state_id');
		$this->addCondition($query, 'city');
		$this->addCondition($query, 'zip', true);
		$this->addCondition($query, 'country_id');
		$this->addCondition($query, 'phone', true);
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
