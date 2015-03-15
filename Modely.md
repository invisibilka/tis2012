# Modely k databazovym tabulkam #

## Funkcionalitu piseme v style: ##
  1. Vyrobime / upravime potrebne tabulky v phpmyadminovi
  1. Vyrobime si model, priklad funkcnej, okomentovanej, hoci nic nerobiacej triedy

http://codepaste.net/kygmuq

## K funkciam rules a relations: ##
### Rules ###
vysvetlim tri, zvysne sa daju najst tu:
http://www.yiiframework.com/doc/guide/1.1/en/form.model#declaring-validation-rules

```
public function rules()
{
return array(
array('first_name, last_name', 'required'),
array('first_name, last_name', 'length', 'max'=>32),
array('age, 'numerical', 'integerOnly' => true),
);
}
```

Pravidiel mozme mat kolko chceme, kazde pravidlo je pole s najmenej dvoma prvkami.
  * rvy prvok je string, kde su ciarkami oddelene stlpce, ktorych sa to tyka,
  * ruhy prvok je string - nazov validatora, ktory chceme pouzit. , teda napr. 'required', ktory reprezentuje povinne polozky formulara.

Dalsie parametre moze blizsie upresnit nastavenia validatora, ako vidime, pri length validatore je logicke pouzit 'max', kde specifikujeme maximalnu dlzku daneho stringu, ale pri ciselnom validatore povolit len cele cisla.

### Relacie: ###
Ako vieme z Databaz, existuju 4 podstatne relacie:
  * 1:1
  * 1:N
  * N:1
  * N:M

**1:1** je nezaujimave, v tomto pripade mame vsetky data v jednej tabulke, nepotrebujeme ich rozbijat

**1:N**, nas model, napriklad student ma pridelenych vela uloh, v Yii reprezetovane konstantov HAS\_MANY, udava sa nazov tabulky, na ktoru sa relacia vztahuje a stplec v tej tabulke, ktory obsahuje primarny kluc z tejto tabulky. Tj v tabulke `student_tasks` mame napriklad `student_id`, ktore je vzdy `id` studenta z tabulky `students`

priklad z modelu Students:

```
public function relations(){
return array(
'tasks' => array(self::HAS_MANY, 'Tasks', 'student_id'), 
)
}
```

**N:1** je ta ista situacia, ale z pohladu ulohy, reprezentuje sa konstantou BELONGS\_TO, dalej sa rovnako uda tabulka na ktoru sa to viaze a nakoniec sa stlpec v tejto tabulke, ktory odkazuje na primarny kluc v druhej tabulke.

```
public function relations(){
return array(
'student' => array(self::BELONGS_TO, 'Students', 'student_id'), 
)
}
```

**N:M**, to je ta skareda relacia, ked moze napriklad viac ziakov robit na jednej ulohe sucasne a kazdy ziak moze robit na viacerych ulohach. V taktomto pripade, ak si spominate na IDS, tak nas ucili, ze si v databaze vyrobime specialnu relacnu tabulku, ktora obsahuje v kazdom riadku len primarne kluce z oboch povodnych tabuliek a tak popisuje tieto vztahy. V Yii mame konstantu MANY\_MANY. Udava sa opat nazov modelu a potom nazov relacnej tabulky, kde nasleduju v zatvorke: primarny kluc z tejto tabulky, primarny kluc z druhej tabulky.

Priklad z pohladu studenta, relacnu tabulku som nazval students\_tasks.

```
public function relations(){
return array(
'tasks' => array(self::MANY_MANY, 'Tasks', 'students_tasks(student_id, task_id)'), 
)
}
```

Na zaver sa asi pyate, preco to robit takto.

Take tie honosne dovody su, ze takto mame kazdu entitu pekne zabalenu v triede, pekny jednotny pristup, v kode sa da vyznat a tak dalej.
Realne vyuzitie je ale nasledovne a myslim si, ze velmi pekne a prehladne:

Vytiahnutie studenta z databazy podla id:
```
$student = Students::model()->findByPk($id);
```

Ziadne selecty netreba(!)

Dalej:

Zmena jeho veku:
```
$student->age = $new_age; 
$student->update(); 
```
Z toho vidime:
  * utomaticky mozme pristupovat k stlpcom ako v premennym
  * iadne sql-update, je na to metoda, ktora to cele zariadi

A posledne, predstavme si bud 1:N, alebo N:M relaciu spomenutu vyssie a chceme vypisat vsetky ulohy, ktore student ma:
```
foreach ($student->tasks as $task){
echo $task->name;
}
```

Takto mozme pristupovat k pridruzenym polozkam ako ku klasickym poliam, samozrejme, funguje pre ne aj vestky standartne funkcie na prace s polami napr: count($student->tasks)

Kam dalej: [ControlleryCRUD](ControlleryCRUD.md)

---

Autor: Vladimir Jurenka