<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'newTeam')">Players</button>
  <button class="tablinks" onclick="openCity(event, 'newPlayer')">Teams</button>
  <button class="tablinks" onclick="openCity(event, 'playerGame')">Player's Games</button>
  <button class="tablinks" onclick="openCity(event, 'teamGame')">Team Games</button>
</div>

<div id="newTeam" class="tabcontent">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by name.." title="Type in a name">
  <table id="myTable" align="center">
  <tr>
	<th onclick="sortTable(0)">First Name</th>
	<th onclick="sortTable(1)">Last Name</th>
	<th onclick="sortTable(2)">Jersey #</th>
	<th onclick="sortTable(3)">Position</th>
	<th onclick="sortTable(4)">Height</th>
	<th onclick="sortTable(5)">Weight</th>
	<th onclick="sortTable(6)">Team</th>
  </tr>
	<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	if ($conn-> connect_error) {
	  die("Connection failed:". $conn-> connect_error);
	}	
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result1 = $conn->query($sql1);
	$row = $result1->fetch_assoc();
	$id = $row['id'];

	$sql = "SELECT firstname, lastname, number, position, height, weight, team FROM basketballPlayer WHERE userkey = '$id'";
	$result = $conn-> query($sql);
	if ($result-> num_rows > 0) {
	  while ($row = $result-> fetch_assoc()) {
	    echo "<tr>";
	    echo "<td>". $row["firstname"] ."</td>";
	    echo "<td>". $row["lastname"] ."</td>";
	    echo "<td>". $row["number"] ." </td>";
	    echo "<td>". $row["position"] ." </td>";
	    echo "<td>". $row["height"] ." </td>";
	    echo "<td>". $row["weight"] ." </td>";
	    echo "<td>". $row["team"] ." </td>";
	    echo "</tr>";
	  }
	  echo "</table>";
	}
	else {
	  echo "";
	}
	
	$conn-> close();
	?>
  </table>

  <script>

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>
</div>

<div id="newPlayer" class="tabcontent">
  <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Filter by name.." title="Type in a name">
  <table id = "myTable2" align="center">
    <tr>
	<th onclick="sortTable2(0)">Name</th>
	<th onclick="sortTable2(1)">City</th>
	<th onclick="sortTable2(2)">State</th>
    </tr>
	<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	if ($conn-> connect_error) {
	  die("Connection failed:". $conn-> connect_error);
	}
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result1 = $conn->query($sql1);
	$row = $result1->fetch_assoc();
	$id = $row['id'];

	$sql = "SELECT teamname, city, state FROM basketballTeam WHERE userkey = '$id'";
	$result = $conn-> query($sql);
	if ($result-> num_rows > 0) {
	  while ($row = $result-> fetch_assoc()) {
	    echo "<tr>";
	    echo "<td>". $row["teamname"] ."</td>";
	    echo "<td>". $row["city"] ."</td>";
	    echo "<td>". $row["state"] ."</td>";
	    echo "</tr>";
	  }
	  echo "</table>";
	}
	else {
	  echo "";
	}
	
	$conn-> close();
	?>
  </table>
  <script>

function sortTable2(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


  function myFunction2() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable2");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>
</div>

<div id="playerGame" class="tabcontent">
  <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Filter by name.." title="Type in a name">
<table id="myTable3" align="center">
  <tr>
	<th onclick="sortTable3(0)">Name</th>
	<th onclick="sortTable3(1)">Date</th>
	<th onclick="sortTable3(2)">Minutes</th>
	<th onclick="sortTable3(3)">Points</th>
	<th onclick="sortTable3(4)">Rebounds</th>
	<th onclick="sortTable3(5)">Assists</th>
	<th onclick="sortTable3(6)">Steals</th>
	<th onclick="sortTable3(7)">Blocks</th>
	<th onclick="sortTable3(8)">Turnovers</th>
	<th onclick="sortTable3(9)">FGA</th>
	<th onclick="sortTable3(10)">FGM</th>
	<th onclick="sortTable3(11)">3PA</th>
	<th onclick="sortTable3(12)">3PM</th>
	<th onclick="sortTable3(13)">FTA</th>
	<th onclick="sortTable3(14)">FTM</th>

  </tr>
	<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	if ($conn-> connect_error) {
	  die("Connection failed:". $conn-> connect_error);
	}
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result1 = $conn->query($sql1);
	$row = $result1->fetch_assoc();
	$id = $row['id'];

	$sql = "SELECT playername, date, minutes, points, rebounds, assists, steals, blocks, turnovers, fga, fgm, 
		3pa, 3pm, fta, ftm FROM basketballPlayerGame WHERE userkey = '$id'";
	$result = $conn-> query($sql);
	if ($result-> num_rows > 0) {
	  while ($row = $result-> fetch_assoc()) {
	    echo "<tr>";
	    echo "<td>". $row["playername"] ."</td>";
	    echo "<td>". $row["date"] ."</td>";
	    echo "<td>". $row["minutes"] ."</td>";
	    echo "<td>". $row["points"] ."</td>";
	    echo "<td>". $row["rebounds"] ."</td>";
	    echo "<td>". $row["assists"] ."</td>";
	    echo "<td>". $row["steals"] ."</td>";
	    echo "<td>". $row["blocks"] ."</td>";
	    echo "<td>". $row["turnovers"] ."</td>";
	    echo "<td>". $row["fga"] ."</td>";
	    echo "<td>". $row["fgm"] ."</td>";
	    echo "<td>". $row["3pa"] ."</td>";
	    echo "<td>". $row["3pm"] ."</td>";
	    echo "<td>". $row["fta"] ."</td>";
	    echo "<td>". $row["ftm"] ."</td>";
	    echo "</tr>";
	  }
	  echo "</table>";
	}
	else {
	  echo "";
	}
	
	$conn-> close();
	?>
  </table>
  <script>

function sortTable3(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable3");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


  function myFunction3() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput3");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable3");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>
</div>

<div id="teamGame" class="tabcontent">
  <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Filter by name.." title="Type in a name">
<table id = "myTable4" align="center">
  <tr>
	<th onclick="sortTable4(0)">Name</th>
	<th onclick="sortTable4(1)">Date</th>
	<th onclick="sortTable4(2)">Opponent</th>
	<th onclick="sortTable4(3)">Location</th>
	<th onclick="sortTable4(4)">Result</th>
	<th onclick="sortTable4(5)">Points</th>
	<th onclick="sortTable4(6)">Rebounds</th>
	<th onclick="sortTable4(7)">Assists</th>
	<th onclick="sortTable4(8)">Steals</th>
	<th onclick="sortTable4(9)">Blocks</th>
	<th onclick="sortTable4(10)">Turnovers</th>
	<th onclick="sortTable4(11)">FGA</th>
	<th onclick="sortTable4(12)">FGM</th>
	<th onclick="sortTable4(13)">3PA</th>
	<th onclick="sortTable4(14)">3PM</th>
	<th onclick="sortTable4(15)">FTA</th>
	<th onclick="sortTable4(16)">FTM</th>
  </tr>
	<?php
	session_start();
	$conn = new mysqli('localhost', 'lawingtr', '900599349', '4800-191-t3');
	if ($conn-> connect_error) {
	  die("Connection failed:". $conn-> connect_error);
	}
	$sql1 = "SELECT id FROM users WHERE username  = '{$_SESSION['username']}'";
	$result1 = $conn->query($sql1);
	$row = $result1->fetch_assoc();
	$id = $row['id'];

	$sql = "SELECT teamname, date, opponentname, location, result, points, rebounds, assists, steals, blocks, 
		turnovers, fga, fgm, 3pa, 3pm, fta, ftm FROM basketballTeamGame WHERE userkey = '$id'";
	$result = $conn-> query($sql);
	if ($result-> num_rows > 0) {
	  while ($row = $result-> fetch_assoc()) {
	    echo "<tr>";
	    echo "<td>". $row["teamname"] ."</td>";
	    echo "<td>". $row["date"] ."</td>";
	    echo "<td>". $row["opponentname"] ."</td>";
	    echo "<td>". $row["location"] ."</td>";
	    echo "<td>". $row["result"] ."</td>";
	    echo "<td>". $row["points"] ."</td>";
	    echo "<td>". $row["rebounds"] ."</td>";
	    echo "<td>". $row["assists"] ."</td>";
	    echo "<td>". $row["steals"] ."</td>";
	    echo "<td>". $row["blocks"] ."</td>";
	    echo "<td>". $row["turnovers"] ."</td>";
	    echo "<td>". $row["fga"] ."</td>";
	    echo "<td>". $row["fgm"] ."</td>";
	    echo "<td>". $row["3pa"] ."</td>";
	    echo "<td>". $row["3pm"] ."</td>";
	    echo "<td>". $row["fta"] ."</td>";
	    echo "<td>". $row["ftm"] ."</td>";
	    echo "</tr>";
	  }
	  echo "</table>";
	}
	else {
	  echo "";
	}
	
	$conn-> close();
	?>
  </table>
  <script>

function sortTable4(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable4");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

  function myFunction4() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput4");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable4");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>

</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<p>If you would like to see your data in alterable tables, click one of the buttons below.</p>
<div class = "btn-d">
    <a href="updatePlayer.php">Editable Players</a>
    <a href="updateTeam.php">Editable Teams</a>
    <a href="updatePlayerGames.php">Editable Player Games</a>
    <a href="updateTeamGames.php">Editable Team Games</a>
</div>

