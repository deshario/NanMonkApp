<html>
<head>
    <title></title>
    <style>

    </style>
</head>
<body>
<?php
use app\models\PersonMaster;


echo "<br/><h1 align='center'>ประวัติพระภิกษุ-สามเณร</h1>";

$spaces = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

$personMaster = PersonMaster::find()->where('user_id = ' . $id)->one();
if($personMaster != null){
    $idperson = $personMaster->idperson;
    $person_book_no = $personMaster->person_book_no;
    if($personMaster->prefix == 1){
        $prefix = 'ส.ณ';
    }else{
        $prefix = 'พระ';
    }
    $firstname = $personMaster->firstname;
    $surname = $personMaster->surname;
    $aliasname = $personMaster->aliasname;
    $birthdate = $personMaster->birthdate;
    $eng_date = strtotime("now");
    $nowdate = (date("Y",$eng_date)+543).'-'.(date("m",$eng_date)).'-'.(date("d",$eng_date));
    $age = date_diff(date_create($birthdate), date_create($nowdate))->y;
    $staytemp = $personMaster->staytemp;
    $level = $personMaster->level;
    $temple = $personMaster->temple;
    $homeno = $personMaster->homeno;
    $section = $personMaster->section;

    $tambon_id = $personMaster->address0->tambol_id;
    $amphur_id = $personMaster->address0->amphur_id;
    $province_id = $personMaster->address0->province_id;

    $amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $amphur_id)->one()->AMPHUR_NAME;
    $province = \app\models\Province::find()->where('PROVINCE_ID = ' . $province_id)->one()->PROVINCE_NAME;
    $tambon = \app\models\District::find()->where('DISTRICT_ID = ' . $tambon_id)->one()->DISTRICT_NAME;

    $amphur = str_replace(' ', '', $amphur);
    $province = str_replace(' ', '', $province);
    $tambon = str_replace(' ', '', $tambon);

    echo "<h2>ข้อมูลปัจจุบัน</h2>";

    echo "<p><strong>หมายเลขบัตรประชาชน</strong>".$spaces."<u class='dotted'>".$idperson."</u></p>";
    echo "<p><strong>หมายเลขหนังสือสุทธิ</strong>".$spaces."<u class='dotted'>".$person_book_no."</u></p>";
    echo "<p><strong>ชื่อปัจจุบัน</strong>".$spaces."<u class='dotted'>".$prefix." ".$firstname."</u>"
        .$spaces." ฉายา <u class='dotted'>".$aliasname."</u>"
        .$spaces." นามสกุล <u class='dotted'>".$surname."</u></p>";

    echo "<p><strong>อายุ</strong>".$spaces."<u class='dotted'>".$age."</u>"
        .$spaces." พรรษา <u class='dotted'>".$staytemp."</u>"
        .$spaces." วิทยาฐานะ <u class='dotted'>".$level."</u></p>";

    echo "<p><strong>วัด</strong>".$spaces."<u class='dotted'>".$temple."</u>"
        .$spaces." ที่่อยู่ <u class='dotted'>".$homeno."</u>"
        .$spaces." แขวง/ตำบล <u class='dotted'>".$tambon."</u></p>";

    echo "<p><strong>เขต/อำเภอ</strong>".$spaces."<u class='dotted'>".$amphur."</u>"
        .$spaces." จังหวัด <u class='dotted'>".$province."</u>"
        .$spaces." สังกัดนิกาย <u class='dotted'>".$section."</u></p>";

}else{
    echo "<h2>ไม่พบประวัติข้อมูลปัจจุบัน</h2>";
}

?>

</body>

</html>