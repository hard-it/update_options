<? require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php'; ?>
<? CModule::IncludeModule('iblock'); ?>
<?
$IBLOCK_ID = 67;
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_TYPE");
$arFilter = Array("IBLOCK_ID"=> $IBLOCK_ID, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();?>
    <?if($arProps["TYPE"]["VALUE"] != "да"){
        CIblockElement::SetPropertyValuesEx($arFields["ID"], $IBLOCK_ID, ["TYPE" => "нет"]);
        echo $arFields["ID"].' - '.$arProps["TYPE"]["VALUE"];
    }?>
<? } ?>