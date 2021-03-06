<?php

/**
 * This is the model class for table "article_file".
 *
 * The followings are the available columns in table 'article_file':
 * @property integer $id
 * @property integer $article_id
 * @property integer $server_id
 * @property string $chapter
 * @property string $path
 */
class ArticleFile extends CActiveRecord
{
    public $article_image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, server_id, chapter, path', 'required'),
			array('article_id, server_id', 'numerical', 'integerOnly'=>true),
			array('chapter', 'length', 'max'=>100),
			array('path', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, article_id, server_id, chapter, path', 'safe', 'on'=>'search'),
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
			'article_id' => 'Article',
			'server_id' => 'Server',
			'chapter' => 'Chapter',
			'path' => 'Path',
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
        if(isset($_GET['id'])){
            $criteria->condition='article_id='.$_GET['id'];
        }
		$criteria->compare('id',$this->id);
		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('server_id',$this->server_id);
		$criteria->compare('chapter',$this->chapter,true);
		$criteria->compare('path',$this->path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArticleFile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
