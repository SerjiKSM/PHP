<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property integer $code
 * @property double $price
 * @property integer $availability
 * @property string $brand
 * @property string $image
 * @property string $description
 * @property integer $is_new
 * @property integer $is_recommended
 * @property integer $status
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'code', 'price', 'availability', 'brand', 'image', 'description'], 'required'],
            [['category_id', 'code', 'availability', 'is_new', 'is_recommended', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'brand', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'code' => 'Code',
            'price' => 'Price',
            'availability' => 'Availability',
            'brand' => 'Brand',
            'image' => 'Image',
            'description' => 'Description',
            'is_new' => 'Is New',
            'is_recommended' => 'Is Recommended',
            'status' => 'Status',
        ];
    }
}
