<?php

/**
 * This is the model class for table "articles".
 *
 * The followings are the available columns in table 'articles':
 * @property integer $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $seo_title
 * @property string $seo_description
 * @property integer $active
 * @property string $create_date
 * @property string $update_date
 * @property integer $category_id
 * @property string $tag
 * @property integer $user_id
 */
class Articles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $category;
	public function tableName()
	{
		return 'articles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('title, short_description, description, seo_title, seo_description, create_date, update_date, user_id', 'required'),
			array('active, user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('short_description', 'length', 'max'=>500),
			array('seo_title', 'length', 'max'=>100),
			array('seo_description', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, hot, short_description, description, seo_title, seo_description, active, create_date, update_date, user_id', 'safe', 'on'=>'search'),
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
            'categories' =>array(self::HAS_MANY,'CategoryRelation','table_id','on'=>"table_name='A'"),

		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'short_description' => 'Short Description',
			'description' => 'Description',
			'seo_title' => 'Seo Title',
			'seo_description' => 'Seo Description',
			'active' => 'Active',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'user_id' => 'User',
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
		$criteria->order = "id desc";
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
        $criteria->compare('hot',$this->hot,true);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('seo_description',$this->seo_description,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getTitle($id){
        $model = Articles::model()->findByPk($id);
        if($model == null){
            return "Không có";
        }else{
            return $model->title;
        }
    }
    public function getActive($status){
        if($status == 1){
            return "Không sử dụng";
        }else if($status == 2){
            return "Sử dụng";
        }else{
            return "Không xác định";
        }
    }
     public function getHot($status){
        if($status == 1){
            return "Hot";
        }else if($status == 0){
            return "Bình thường";
        }else{
            return "Không xác định";
        }
    }
    
    public function getImage($model){
        if($model->image != '' and $model->path != ''){
            return CHtml::image(Yii::app()->request->baseUrl.'/'.$model->path.'thumbai_100/'.$model->image,'',array('style'=>'width:100px'));
        }else{
            return "Không có";
        }
    }
    public function getImage2($id){
        $model = Articles::model()->findByPk($id);
        if($model->image != '' and $model->path != ''){
            $image =  CHtml::image(Yii::app()->request->baseUrl.'/'.$model->path.'thumbai_100/'.$model->image,'',array('style'=>'width:100px'));
            return CHtml::link($image, array('/Articles/default/view', 'id'=>$id));
        }else{
            return "Không có";
        }
    }
    public function getCategory($model){
        $string = '';
        if($model->categories != null){
            foreach($model->categories as $value){
                $title = $value->category->title;
                $string= $title.', '.$string;
            }
        }
        return $string;
    }
    public function getImageSlide($model){
        if($model->image != ''){
            return CHtml::image(Yii::app()->request->baseUrl.'/'.$model->path.$model->image,'',array('style'=>'width:200px;','id'=>'image'));
        }else{
            return "Không có";
        }
    }
}
