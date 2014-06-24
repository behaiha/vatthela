<?php

/**
 * This is the model class for table "ads".
 *
 * The followings are the available columns in table 'ads':
 * @property integer $id
 * @property string $start_time
 * @property string $end_time
 * @property integer $possition
 * @property integer $type
 * @property integer $url_link
 * @property integer $isCurrentPage
 * @property integer $_order
 */
class Ads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $width,$height;
	public function tableName()
	{
		return 'ads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('start_time, end_time, possition, type, _order', 'required'),
			array('width,height,image','required','on'=>'image'),
			array('html','required','on'=>'html'),
			array('possition, type, isCurrentPage, _order', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, start_time, end_time, possition, type, url_link, isCurrentPage, mobile', 'safe', 'on'=>'search'),
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
			'start_time' => 'Ngày bắt đầu',
			'end_time' => 'Ngày kết thúc',
			'possition' => 'Vị trí đặt',
			'type' => 'Loại',
			'url_link' => 'Url Link',
			'isCurrentPage' => 'Mở tại',
			'_order' => 'Thứ thự',
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
        $criteria->order='id DESC';
		$criteria->compare('id',$this->id);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);
        $criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('possition',$this->possition);
		$criteria->compare('type',$this->type);
		$criteria->compare('url_link',$this->url_link);
		$criteria->compare('isCurrentPage',$this->isCurrentPage);
		//$criteria->compare('_order',$this->_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getPossition($possition){
        if($possition == 1){
            return "Top";
        }else if($possition == 2){
            return "Bottom";
        }else if($possition == 3){
            return "Left";
        }else if($possition == 4){
            return "Right";
        }else if($possition == 5){
            return 'Center';
        }else{
            return "Không có";
        }
    }
    public function getType($type){
        if($type == 1){
            return "Image";
        }else if($type == 2){
            return "Html";
        }else if($type == 3){
            return "Slide show";
        }else{
            return "Không có";
        }

    }
    public function getIsCurrentPage($current){
        if($current == 1){
            return "Mở tại trang";
        }else if($current == 2){
            return "Mở ở trang khác";
        }else{
            return "Không có";
        }
    }
    public function getImage($model){
        if($model->image != ''){
            return CHtml::image(Yii::app()->request->baseUrl.'/'.$model->path.$model->image,'',array('style'=>'width:100px'));
        }else{
            return "Không có";
        }
    }
    public function getTypeAds($mobile){
        if($mobile == 0){
            return "Ads Desktop";
        }else if($mobile == 1){
            return "Ads Mobile";
        }else{
            return "Không xác định";
        }
    }
}
