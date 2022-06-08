<?php
//課題[1]
$f = file_get_contents("sample.json", false, null, 0);
$all = json_decode($f, true)[0];

foreach ($all as $one) {
  echo $one["name"] . "\n";
}

//課題[2]
$pref_city = [];
foreach ($all as $k => $v) {
  $pref_city[$v["name"]] = [];
  foreach ($v["city"] as $city) {
    array_push($pref_city[$v["name"]], $city["city"]);
  }
}
var_dump($pref_city);

//課題[3]
$area = []; //各都道府県をエリア分けした配列 エリア内訳はネットから拝借→https://clip.zaigenkakuho.com/chiho_kubun/
$area["北海道地方"] = ["県名" => ["北海道"], "市町村名" => []];
$area["東北地方"] = ["県名" => ["青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県"], "市町村名" => []];
$area["関東地方"] = ["県名" => ["東京都", "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "神奈川県"], "市町村名" => []];
$area["中部地方"] = ["県名" => ["新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県", "静岡県", "愛知県"], "市町村名" => []];
$area["近畿地方"] = ["県名" => ["京都府", "大阪府", "三重県", "滋賀県", "兵庫県", "奈良県", "和歌山県"], "市町村名" => []];
$area["中国地方"] = ["県名" => ["鳥取県", "島根県", "岡山県", "広島県", "山口県"], "市町村名" => []];
$area["四国地方"] = ["県名" => ["徳島県", "香川県", "愛媛県", "高知県"], "市町村名" => []];
$area["九州地方"] = ["県名" => ["福岡県", "佐賀県", "長崎県", "大分県", "熊本県", "宮崎県", "鹿児島県", "沖縄県"], "市町村名" => []];


foreach ($pref_city as $pref => $city) {
  foreach ($area as $large_area => $content){
    if (in_array($pref,$content["県名"])){
      $area[$large_area]["市町村名"]=array_merge($area[$large_area]["市町村名"],$city);
    }
  }
}
var_dump($area);
