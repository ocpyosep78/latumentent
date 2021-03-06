<?php

/**
 * This is the model class for table "periodic_cost".
 *
 * The followings are the available columns in table 'periodic_cost':
 * @property integer $id
 * @property string $name
 * @property double $amount
 * @property string $note
 * @property integer $service_id
 * @property date $payment_date
 */
class PeriodicCost extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PeriodicCost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'periodic_cost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, amount, payment_date', 'required'),
			array('amount', 'numerical'),
			array('service_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, amount, note', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','Name'),
			'amount' => Yii::t('app','Amount'),
			'service_id' => Yii::t('app','Service'),
			'payment_date' => Yii::t('app','Payment Date'),
			'note' => Yii::t('app','Note'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function getDates()
	{
		return array (
			1 => 1,
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5,
			6 => 6,
			7 => 7,
			8 => 8,
			9 => 9,
			10 => 10,
			11 => 11,
			12 => 12,
			13 => 13,
			14 => 14,
			15 => 15,
			16 => 16,
			17 => 17,
			18 => 18,
			19 => 19,
			20 => 20,
			21 => 21,
			22 => 22,
			23 => 23,
			24 => 24,
			25 => 25,
			26 => 26,
			27 => 27,
			28 => 28,
			29 => 29,
			30 => 30,
			31 => 31,
		);
	}
}
