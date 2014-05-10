<?php

/**
 * This is the model class for table "tags".
 *
 * The followings are the available columns in table 'tags':
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $title
 * @property string $description
 */
class Tags extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tags';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, title, description', 'required','message'=>'{attribute} không được để trống', 'on'=>'update'),
			array('name', 'length', 'max'=>128),
			array('url', 'length', 'max'=>200),
			array('title', 'length', 'max'=>90),
			array('description', 'length', 'max'=>160),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, url, title, description', 'safe', 'on'=>'search'),
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
			'connects' =>array(self::HAS_MANY,'TagConnect','tag_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'url' => 'Url',
			'title' => 'Title',
			'description' => 'Description',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function saveTags($tags,$model,$type='A')
	{
		foreach ($tags as $key) {
			$check = Tags::model()->findByAttributes(array('name'=>$key));
			if (count($check) == 0) {
				$value = new Tags;
				$value->name = $key;
				$value->url = toSlug(stripVietnamese($value->name));
				if ($value->save()) {
					$tagc = new TagConnect;
					$tagc->tag_id = $value->id;
					$tagc->table_id = $model->id;
					$tagc->table_name =$type;
					$tagc->save();
				}
			}else{
				$test = TagConnect::model()->findAllByAttributes(array('tag_id'=>$check->id,'table_id'=>$model->id,'table_name'=>$type));
				if (count($test) ==0 ) {
					$tagc = new TagConnect;
					$tagc->tag_id = $check->id;
					$tagc->table_id = $model->id;
					$tagc->table_name =$type;
					$tagc->save();
				}
			}
		}
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tags the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
