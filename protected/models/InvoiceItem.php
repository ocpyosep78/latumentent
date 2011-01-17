<?php

/**
 * This is the model class for table "invoice_item".
 *
 * The followings are the available columns in table 'invoice_item':
 * @property integer $id
 * @property double $amount
 * @property double $subtotal_compensation
 * @property integer $invoice_id
 * @property integer $period_id
 * @property integer $customer_id
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Invoice $invoice
 * @property Period $period
 * @property Ticket[] $tickets
 */
class InvoiceItem extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return InvoiceItem the static model class
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
		return 'invoice_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, subtotal_compensation, invoice_id, period_id, customer_id', 'required'),
			array('invoice_id, period_id, customer_id', 'numerical', 'integerOnly'=>true),
			array('amount, subtotal_compensation', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, subtotal_compensation, invoice_id, period_id, customer_id', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'invoice' => array(self::BELONGS_TO, 'Invoice', 'invoice_id'),
			'period' => array(self::BELONGS_TO, 'Period', 'period_id'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'invoice_item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'amount' => Yii::t('app','Amount'),
			'subtotal_compensation' => Yii::t('app','Subtotal Compensation'),
			'invoice_id' => Yii::t('app','Invoice'),
			'period_id' => Yii::t('app','Period'),
			'customer_id' => Yii::t('app','Customer'),
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
		$criteria->compare('amount',$this->amount);
		$criteria->compare('subtotal_compensation',$this->subtotal_compensation);
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('period_id',$this->period_id);
		$criteria->compare('customer_id',$this->customer_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}