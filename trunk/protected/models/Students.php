<?php

class Students extends CActiveRecord
{
	
	public $list_id;

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_students';
    }

    public function rules()
    {
        return array();
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id')

        );
    }
	
	public function search(){
        $criteria = new CDbCriteria();
		$criteria->join='left join tis_students_lists tsl on tsl.student_id=t.id';
		$criteria->condition='tsl.list_id= :list_id';
		$criteria->params=array(':list_id'=>$this->list_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

}
?>