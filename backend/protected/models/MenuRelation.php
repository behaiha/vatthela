<?php

/**
 * This is the model class for table "menu_relation".
 *
 * The followings are the available columns in table 'menu_relation':
 * @property integer $id
 * @property integer $menu_id
 * @property integer $table_id
 * @property string $table_name
 * @property integer $position
 * @property string $text
 * @property integer $parent_id
 */
class MenuRelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_id, table_id, position, text, parent_id', 'required'),
			array('menu_id, table_id, position, parent_id', 'numerical', 'integerOnly'=>true),
			array('table_name', 'length', 'max'=>11),
			array('text', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menu_id, table_id, table_name, position, text, parent_id', 'safe', 'on'=>'search'),
		);
	}


	public function getChildValue($values)
	{
		$res = "";
		foreach ($values as $key => $value) {
			if ($value->table_name == 'L') {
				$li = "id='list_{$value->id}' data-url='{$value->link->href}' data-type='L' data-text='{$value->text}' value='0' ";
			}
			if ($value->table_name == 'C') {
				$li = "id='list_{$value->id}' data-url='{$value->table_id}' data-type='C' data-text='{$value->text}' value='0' ";
			}
			if (count($value->childrens)==0){ // if node is leave
				$res .= "<li $li ><div  onclick='clickLi($(this));'><span class='disclose'><span></span></span>{$value->text}</div>";				
			} else {
				$childs = $this->getChildValue($value->childrens);
					$res .= "<li $li ><div onclick='clickLi($(this));'><span class='disclose'><span></span></span>{$value->text}</div>"."<ol>".$childs."</ol>";
			}	
		}
		return $res;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'childrens' =>array(self::HAS_MANY,'MenuRelation','parent_id'),
			'category'=> array(self::BELONGS_TO,'Categories','table_id'),
			'link'=> array(self::BELONGS_TO,'Link','table_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Menu',
			'table_id' => 'Table',
			'table_name' => 'Table Name',
			'position' => 'Position',
			'text' => 'Text',
			'parent_id' => 'Parent',
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
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('table_id',$this->table_id);
		$criteria->compare('table_name',$this->table_name,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuRelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
