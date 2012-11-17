<?php
/**
 * Komponent zabezpecuje import mien a mailovych adries z xlxs suboru
 * @author V.Jurenka
 */
class XLXSImport
{
    /**
     * Importuje do zoznamu studentov mena a adresy z xlsx suboru
     * @param $user - uzivatel
     * @param $list - zoznam do ktoreho sa importuje
     * @param $file - subor z ktoreho sa importuje
     */
    public function import($user , $list, $file){
        $xlsx = new SimpleXLSX($file);
        foreach($xlsx->rows() as $row){
            $student = new Students();
            $student->user_id = $user->id;
            $student->name = $row[0]. ' '.$row[1];
            $student->email = $row[2];
            $student->save();
            $list->addStudent($student);
        }
    }

}
