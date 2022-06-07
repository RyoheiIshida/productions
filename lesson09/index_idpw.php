<html>

<body>
    <?php
    $member = [];
    $member["yama_chan"] = ["pw" => "12345678", "name" => "yamada"];
    $member["taka_chan"] = ["pw" => "qawsedrf", "name" => "takada"];
    $member["baba_chan"] = ["pw" => "password", "name" => "bannba"];

    if (!array_key_exists($_POST["id"], $member)) {
        echo "送信されたID情報は登録されていません";
    } elseif ($_POST["pw"] != $member[$_POST["id"]]["pw"]) {
        echo "パスワードが間違っています。";
    } elseif ($_POST["pw"] == $member[$_POST["id"]]["pw"]) {
        echo $member[$_POST["id"]]["name"];
    }
    ?>
</body>

</html>