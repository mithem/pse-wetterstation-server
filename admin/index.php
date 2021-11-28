<?php
    global $SCHOOL_MONITOR_TABLE;
    $sql = "SELECT * FROM `{$SCHOOL_MONITOR_TABLE}` WHERE `key` = 'wechselintervall'";
    $result = mysql_query($sql);
    $row = mysql_fetch_object($result);
    $wechselintervall = $row->value;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>
        function changeViewIntervalOnSchoolMonitor() {
			console.log("changing view interval");
            const interval = prompt("Neues Wechselinterval? [Sekunden]")
            fetch("/admin/schulMonitorWechselintervalAendern.php?interval=" + interval, {
                method: "POST"
            })
            .then(response => {
				console.log(response);
                response.text()
                .then(text => {
                    if text.lower() == "erfolgreich" {
                        alert("Wechselinterval erfolgreich geändert!");
                    } else {
                        alert("Wechselinterval konnte nicht geändert werden!");
                    }
                })
            })
        }
    </script>
</head>
<body>
    <div class="card">
        <p>Aktuelles Wechselinterval: <?php $wechselintervall ?></p>
        <button id="btn-change-view-interval-on-school-monitor" class="btn btn-primary">Schulmonitor: Wechselinterval ändern</button>
    </div>
	<script>
		document.getElementById("btn-change-view-interval-on-school-monitor").onclick = () => {
			console.log("onclick!");
			changeViewIntervalOnSchoolMonitor()
		}
	</script>
</body>
</html>