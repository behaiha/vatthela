<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $description
 * @property string $create_date
 * @property integer $user_id
 * @property integer $active
 * @property integer $order_possition
 * @property integer $type
 * @property string $seo_title
 * @property integer $seo_description
 */
class Categories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' title, description, create_date, user_id, active, order_possition, type, seo_title, seo_description', 'required'),
			array('parent_id, user_id, active, order_possition', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('seo_title', 'length', 'max'=>70),
			array('seo_description', 'length', 'max'=>140),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, title, description, create_date, user_id, active, order_possition, type, seo_title, seo_description', 'safe', 'on'=>'search'),
		);
	}
	public function checkCategory($category,$model, $type)
	{
		if (!isset($model->id)) {
			return -1;
		}
		$model = CategoryRelation::model()->findAll("table_id = $model->id and table_name='$type' and category_id = $category");
		if (count($model) == 1) {
			return 1;
		}
		return 0;
	}
	public function saveCategory($values,$id,$table)
	{
		if (isset($values)) {
			foreach ($values as $key) {
				$model = CategoryRelation::model()->findAll("table_id = $id and table_name='$table' and category_id = $key");
				if (count($model) == 0) {
					$value = new CategoryRelation;
					$value->table_id = $id;
					$value->table_name = $table;
					$value->category_id = $key;
					$value->save();
				}
			}
		}
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'connects' =>array(self::HAS_MANY,'CategoryRelation','category_id'),
            'parent'=> array(self::BELONGS_TO,'Categories','parent_id','condition'=>'t.parent_id <> 0'),
            'children' =>array(self::HAS_MANY,'Categories','parent_id','order' =>'order_possition asc'),
            'articles' =>array(self::MANY_MANY,'Articles','category_relation(category_id,table_id)','on'=>'table_name="A"','limit'=>5),
        );
	}
    
    /**
        Function get URL Categories
    **/
    public function getURL($model){
        return Yii::app()->createUrl('Articles/Category/viewArticleOfCate',array('id'=>$model->id));
    }
    
    /**
        End Function get URL Categories
    **/
	public function getType($value)
	{
		if ($value->type == 'G') {
			return "Không hiện";
		}else{
			return "Hiện tại trang chủ tin tức";
		}
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'title' => 'Title',
			'description' => 'Description',
			'create_date' => 'Create Date',
			'user_id' => 'User',
			'active' => 'Active',
			'order_possition' => 'Order Possition',
			'type' => 'Type',
			'seo_title' => 'Seo Title',
			'seo_description' => 'Seo Description',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('active',$this->active);
		$criteria->compare('order_possition',$this->order_possition);
		$criteria->compare('type',$this->type);
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('seo_description',$this->seo_description);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function makeDropDown($parents){
        global $data;
        $data = array();
        $data[''] = 'Lựa chọn thể loại';
        foreach ($parents as $parent) {
            $data[$parent->id] = $parent->title;
            $this->subDropDown($parent->children);
        }
        return $data;
    }
    public function subDropDown($children, $space='---'){
        global $data;
        foreach ($children as $child) {
            $data[$child->id] = $space.$child->title;
            $this->subDropDown($child->children,$space.'---');
        }
    }
    
    
    public function getName($id){
        $model = Categories::model()->findByPk($id);
        if($model===null){
            return "Không có";
        }else{
            return $model->title;
        }
    }
    public function getListName($table_id,$table_name){
        $criteria = new CDbCriteria;
        $criteria->condition='table_id='.$table_id.' AND table_name='.'"'.$table_name.'"';
        $model = CategoryRelation::model()->findAll($criteria);
        if($model === null){
            return "Không có";
        }else{
            return $model; 
        }
    }
    public function makeHtml($parents){
        global $data;
        $data = array();
        foreach ($parents as $parent) {
            $data[$parent->id] = '<li ><a href="#">'.$parent->title.'</a></li>';
            $this->subDropDown($parent->children);
        }
        return $data;
    }
    public function getTitle($id)
    {
    	$model = Categories::model()->findByPk($id);
    	if ($model != null) {
    		echo $model->title;
    	}
    }
}
