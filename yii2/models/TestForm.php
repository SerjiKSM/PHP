<?php

namespace app\models;
//use yii\base\Model;

use yii\db\ActiveRecord;

//class TestForm extends Model {
class TestForm extends ActiveRecord {
	
//	public $name;
//	public $email;
	public $text;
	
	public static function tableName()	{
		return 'user';
	}

	public function attributeLabels() {
		return [
			'name' => 'Имя',
			'email' => 'E-mail',
			'text' => 'Текст сообщения',
		];
	}
	
	public function rules() {
		return [
//			[['name', 'email'], 'required', 'message' => 'Поле обязательно!'],
			[['name'], 'required'],
			['email', 'email' ],
//			['name', 'string', 'min' => 2, 'tooShort' => 'Мало'],
//			['name', 'string', 'max' => 5, 'tooLong' => 'Много']
			
//			['name', 'string', 'length' => [2,5] ],
//
//			['name', 'myRule'],
			
			['text', 'trim'],
			
		];
	}
	
//	public function myRule($attribute) {
//		if (!in_array($this->$attribute, ['hello', 'world'])) {
//			$this->addError($attribute, 'Wrong!.');
//		}
//	}
	
}