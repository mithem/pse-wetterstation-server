<?php
function changeInterval() {
    global $CONNECTED_DB;
    global $SCHOOL_MONITOR_TABLE;
    $interval = $_POST['interval'];
    $sql = "UPDATE `{$SCHOOL_MONITOR_TABLE}` SET `value` = '$interval' WHERE `key` = 'wechselinterval'";
    $db->query($sql);
    echo "erfolgreich";
}
?>