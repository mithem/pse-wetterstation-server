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
                if(response.ok) {
                    alert("Erfolgreich")
                } else {
					response.text()
					.then(text => {
						alert("Fehler: " + text)
					})
                }
            })
        }
    </script>
</head>
<body>
    <button id="btn-change-view-interval-on-school-monitor" class="btn btn-primary">Schulmonitor: Wechselinterval ändern</button>
	<script>
		document.getElementById("btn-change-view-interval-on-school-monitor").onclick = () => {
			console.log("onclick!");
			changeViewIntervalOnSchoolMonitor()
		}
	</script>
</body>
</html>