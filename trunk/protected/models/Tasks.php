<?php
/**
 * Reprezentuje ulohy v databaze.
 * @author Eva Libantova
 */
class Tasks extends ActiveRecord
{

    /**
     * @var pouziva sa , ak sa vyhladava podla mena autora
     */
    public $username;

    /**
     * @var pouziva sa , ak sa vyhladava podla klucovych slov
     */
    public $keyword;

/*
    public $title;

    public $message;
*/

    /**
     * @var pouziva sa , ak sa hladaju ulohy ktore niesu v danom teste
     */
    public $skipped_test;

    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia Tasks
     */
    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * vrati nazov tabulky v databaze
     * @return string nazov tabulky
     */
    public function tableName()
    {
        return 'tis_tasks';
    }

    /**
     * Obsahuje pravidla validacie
     * @return array - pravidla validacie
     */
    public function rules()
    {
        return array(
            array('user_id, name, html, is_public', 'required', 'message' => 'Položka "{attribute}" musí byť vyplnená.'),
            array('username, keyword', 'safe'),
        );
    }

    /**
     * Vyhladava a triedi ulohy z databazy.
     * @author V.Jurenka
     * @return CActiveDataProvider
     */
    public function search()
    {
        $criteria = new CDbCriteria();

        /*
         * DROP DOWN COMPARE
        $criteria->compare('keywords.id', $this->keyword);
        */

        //OR PARTIAL MATCH
        //OR criteria must be specified first (SQL operator priority), VJ
        if(strlen($this->keyword)){
            $keywords = explode(',', $this->keyword);
            foreach($keywords as $i=>&$keyword){
                $op = 'AND';
                if($i){
                    $op = 'OR';
                }
                $keyword = trim($keyword).'%';
                $criteria->compare('keywords.name', $keyword, true ,$op, false);
            }
        }

        //$criteria->join = 'a';
        /* OR FULL MATCH
        if(strlen($this->keyword)){
            $criteria->compare('keywords.name', $keywords, true);
        }
        */

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('t.name', $this->name, true);
        if ($this->is_public != NULL) {
            $criteria->compare('is_public', $this->is_public);
        }

        $criteria->compare('rating', '>=' . $this->rating);

        $criteria->with = array('user', 'keywords');
        $criteria->together = true;
        $criteria->compare('user.full_name', $this->username, true);

        if($this->skipped_test ){
            $criteria->addCondition('not exists (SELECT * '
                . 'FROM tis_tests_tasks ttt '
                . 'WHERE ttt.task_id = t.id AND ttt.test_id = :test_id '
                . ')');
            $criteria->params[':test_id'] = $this->skipped_test;
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    /**
     * Reprezentuje vztahy medzi modelmi
     * @return array - vztahy medzi modelmi
     */
    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'keywords' => array(self::MANY_MANY, 'Keywords', 'tis_tasks_keywords(task_id, keyword_id)'),
            'comments' => array(self::HAS_MANY, 'Comments', 'task_id'),
            'ratings' => array(self::HAS_MANY, 'Ratings', 'task_id'),
            'tests' => array(self::MANY_MANY, 'Test', 'tis_tests_tasks(task_id, test_id)'),
            'tests_tasks' => array(self::HAS_MANY, 'TestsTasks', 'task_id'),
        );
    }

    /** Funkcia definuje text, ktory sa ma zobrazit pri prvkoch formulara.
     * @return array - pole labelov
     */
    public function attributeLabels()
    {
        return array(
            'name' => 'Názov úlohy',
            'html' => 'Text úlohy',
            'is_public' => 'Verejná (zobrazuje&nbsp;sa&nbsp;ostatným&nbsp;učiteľom)',
            'rating' => 'Hodnotenie',
            'user' => 'Autor úlohy',
            'username' => 'Autor úlohy',
            'keyword' => 'Kľúčové slová',
            'keywords' => 'Kľúčové slová'

        );
    }

    /**
     * Vrati pole sukromna/verejna do filtra
     * @author V. Jurenka
     * @return array
     */
    public function getPublicStates()
    {
        return array(
            array('id' => '0', 'name' => 'Súkromná'),
            array('id' => '1', 'name' => 'Verejná'),
        );
    }

    /**
     * Vrati pouzite klusove slova
     * @author V. Jurenka
     * @return array
     */
    public function getKeywordsList()
    {
        $keywords = array();
        foreach($this->keywords as $keyword){
            $keywords[] = $keyword->name;
        }
        $result = implode(', ', $keywords);
        return CHtml::encode($result);
    }

    /**
     * Ulozi klucove slova
     */
    private function saveKeywords(){
        if(strlen($this->keyword) == 0){
            return;
        }
        $keywords = explode(',', $this->keyword);
        foreach($keywords as $keyword){
            $keyword = trim($keyword);
            //najdi keyword
            $model = Keywords::model()->find('name = :name', array(':name' => $keyword));
            if($model){
                //zisti ci uz savenute, zaroven odstrani duplikaty
                $alreadySaved = false;
                foreach($this->keywords as $old){
                    if($old->id == $model->id){
                        $alreadySaved = true;
                        break;
                    }
                }
                if($alreadySaved){
                    continue;
                }
            }
            else{
                //vyrob keyword
                $model = new Keywords();
                $model->name = $keyword;
                $model->save();
            }
            //saveni relaciu
            Yii::app()->db->createCommand()->insert('tis_tasks_keywords', array('task_id' => $this->id, 'keyword_id' => $model->id));
        }
    }

    /**
     * Vola sa po ulozeni modelu
     */
    protected function afterSave()
    {
        $this->saveKeywords();
        parent::afterSave();
    }

    /**
     * vycistenie databazy pri mazani
     */
    protected function afterDelete()
    {
       // TasksComments::model()->deleteAll('task_id = :task_id', array(':task_id' => $this->id));
       // TasksRating::model()->deleteAll('task_id = :task_id', array(':task_id' => $this->id));
       // TestsTasks::model()->deleteAll('task_id = :task_id', array(':task_id' => $this->id));
        foreach($this->comments as $comment){
            $comment->delete();
        }
        foreach($this->tests_tasks as $tests_task){
            $tests_task->delete();
        }
        foreach($this->ratings as $rating){
            $rating->delete();
        }
        parent::afterDelete();
    }


}
