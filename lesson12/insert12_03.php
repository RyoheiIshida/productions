<?php
require_once __DIR__ . '/DbManager.php';
$f = file_get_contents("sample.json", false, null, 0);
$pref_data = json_decode($f, true)[0];

$dbh = getDb();

$large_area_arr = []; //各都道府県をエリア分けした配列 エリア内訳はネットから拝借→https://clip.zaigenkakuho.com/chiho_kubun/
$large_area_arr["北海道地方"] = ["北海道"];
$large_area_arr["東北地方"] = ["青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県"];
$large_area_arr["関東地方"] = ["東京都", "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "神奈川県"];
$large_area_arr["中部地方"] = ["新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県", "静岡県", "愛知県"];
$large_area_arr["近畿地方"] = ["京都府", "大阪府", "三重県", "滋賀県", "兵庫県", "奈良県", "和歌山県"];
$large_area_arr["中国地方"] = ["鳥取県", "島根県", "岡山県", "広島県", "山口県"];
$large_area_arr["四国地方"] = ["徳島県", "香川県", "愛媛県", "高知県"];
$large_area_arr["九州地方"] = ["福岡県", "佐賀県", "長崎県", "大分県", "熊本県", "宮崎県", "鹿児島県", "沖縄県"];

#large_areaのinsert
foreach ($pref_data as $pref_key => $pref_value) {
    $stt = $dbh->prepare("insert into large_area (prefecture_name,prefecture_id,name) values(:prefecture_name,:prefecture_id,:name)");
    $stt->bindvalue(":prefecture_name", $pref_value["name"]);
    $stt->bindvalue(":prefecture_id", (int)$pref_value["id"]);
    foreach ($large_area_arr as $large_area_key => $large_area_value) {
        if (in_array($pref_value["name"], $large_area_value)) {
            $stt->bindvalue(":name", $large_area_key);
        }
    }
    $stt->execute();
}

#prefectureのinsert
foreach ($pref_data as $pref_key => $pref_value) {
    $stt = $dbh->prepare("insert into prefecture (prefecture_id,name) values(:id,:name)");
    $stt->bindvalue(":id", $pref_value["id"]);
    $stt->bindvalue(":name", $pref_value["name"]);
    $stt->execute();
}

#cityのinsert
foreach ($pref_data as $pref_key => $pref_value) {
    $stt = $dbh->prepare("insert into city (name,citycode,prefecture_id) values(:name,:citycode,:prefecture_id)");
    foreach ($pref_value["city"] as $c) {
        $stt->bindvalue(":name", $c["city"]);
        $stt->bindvalue(":citycode", $c["citycode"]);
        $stt->bindvalue(":prefecture_id", $pref_value["id"]);
        $stt->execute();
    }
}
