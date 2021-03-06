<?php

/**
 * This is the model class for table "category_relation".
 *
 * The followings are the available columns in table 'category_relation':
 * @property integer $id
 * @property integer $category_id
 * @property integer $table_id
 * @property string $table_name
 */
class CategoryRelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, table_id, table_name', 'required'),
			array('category_id, table_id', 'numerical', 'integerOnly'=>true),
			array('table_name', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, table_id, table_name', 'safe', 'on'=>'search'),
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
			'category'=> array(self::BELONGS_TO,'Categories','category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'table_id' => 'Table',
			'table_name' => 'Table Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('table_id',$this->table_id);
		$criteria->compare('table_name',$this->table_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoryRelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
    By Trai Ngeo @2014
    **/
    
    public function getCategoryId($model,$type){
        $criteria = new CDbCriteria;
        $criteria->condition='table_id='.$model->id.' and table_name='.'"'.$type.'"'.' and 1 = 1';
        $cate_re = CategoryRelation::model()->findAll($criteria);
        $arr = array();
        foreach($cate_re as $key=>$row){
            $arr[$key] = $row->category_id;
        }
        return $arr;
    }
}
