<?php

/**
 * This is the model class for table "videos".
 *
 * The followings are the available columns in table 'videos':
 * @property integer $id
 * @property string $video_id
 * @property string $video_image
 * @property string $video_title
 * @property string $video_shortdescription
 * @property string $video_description
 * @property string $video_createdate
 * @property integer $hot
 * @property integer $active
 */
class Videos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'videos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('video_id, video_image, video_title, video_shortdescription, video_description, video_createdate', 'required'),
			array('hot, active', 'numerical', 'integerOnly'=>true),
			array('video_id', 'length', 'max'=>200),
			array('video_image, video_title, video_shortdescription', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, video_id, video_image, video_title, video_shortdescription, video_description, video_createdate, hot, active', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'video_id' => 'Video',
			'video_image' => 'Video Image',
			'video_title' => 'Video Title',
			'video_shortdescription' => 'Video Shortdescription',
			'video_description' => 'Video Description',
			'video_createdate' => 'Video Createdate',
			'hot' => 'Hot',
			'active' => 'Active',
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
		$criteria->compare('video_id',$this->video_id,true);
		$criteria->compare('video_image',$this->video_image,true);
		$criteria->compare('video_title',$this->video_title,true);
		$criteria->compare('video_shortdescription',$this->video_shortdescription,true);
		$criteria->compare('video_description',$this->video_description,true);
		$criteria->compare('video_createdate',$this->video_createdate,true);
		$criteria->compare('hot',$this->hot);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Videos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getAll(){
        return Yii::app()->createUrl('Videos/default/index');
    }
    
    public function getURL($model){
        if($model != null){
            return Yii::app()->createUrl('Videos/default/view',array('id'=>$model->id,'title'=>$model->url));
        }
    }
    
    public function getVideoMost(){
        return Yii::app()->createUrl('Videos/default/viewmost');
    }
    
    public function getDate($model){
        if($model->video_createdate != ''){
            return date('F j, Y, g:i a', strtotime ($model->video_createdate));
        }
    }
    
    public function getThumbaiSmall($model){
        return '<img src="'.$model->video_image.'" width="60"/>';
    }
}
