
function get1() {

  if (!ajax) {
    alert("Ajax не инициализирован"); return;
  }

  var date1 = document.getElementById("datetime1").value;
  var date2 = document.getElementById("datetime2").value;
  var but1 = document.getElementById("but1").value;

  ajax.onreadystatechange = Update1_1;

  var params = "datetime1=" + date1 + "&datetime2=" + date2 + "&button=" + but1;
  var URI = "matches_from_dates.php?"+params;

  ajax.open("GET", URI, true);
  ajax.send(null);
}

function get2() {

  if (!ajax) {
    alert("Ajax не инициализирован"); return;
  }

  var s2val = document.getElementById("player").value;
  var but2 = document.getElementById("but2").value;

  ajax.onreadystatechange = Update1_2;

  var params = "player=" + s2val + "&button=" + but2;
  var URI = "matches_with_player.php?"+params;

  ajax.open("GET", URI, true);
  ajax.send(null);

}

function get3() {

  if (!ajax) {
    alert("Ajax не инициализирован"); return;
  }

  var s3val = document.getElementById("league").value;
  var but3 = document.getElementById("but3").value;

  ajax.onreadystatechange = Update1_3;

  var params = "league=" + s3val + "&button=" + but3;
  var URI = "matches_from_league.php?"+params;

  ajax.open("GET", URI, true);
  ajax.send(null);

}

function Update1_1() {

  if (ajax.readyState == 4) {
    if (ajax.status == 200) {
      var out = document.getElementById('out');
      out.innerHTML = ajax.responseText;
    }
    else console.log(ajax.status + " - " + ajax.statusText);
    ajax.abort();
  }

}


function Update1_2() {

  if (ajax.readyState == 4) {
    if (ajax.status == 200) {
      var out = document.getElementById('out');

      rows = JSON.parse(ajax.response);
      console.log(rows);

      let result =''

      for (var i = 0; i < rows.length; i++) {
        result += '<tr>';
        result += '<td>' + rows[i].ID_Game + '</td>';
        result += '<td>' + rows[i].date + '</td>';
        result += '<td>' + rows[i].place + '</td>';
        result += '<td>' + rows[i].score + '</td>';
        result += '<td>' + rows[i].FID_Team1 + '</td>';
        result += '<td>' + rows[i].FID_Team2 + '</td>';
        result += '</tr>'
      }


      out.innerHTML = result;
    }
    else console.log(ajax.status + " - " + ajax.statusText);
    ajax.abort();
  }

}


function Update1_3() {

  if (ajax.readyState == 4) {
    if (ajax.status == 200) {
      var out = document.getElementById('out');

      let rows = ajax.responseXML.firstChild.children;

      let result =''

      for (var i = 0; i < rows.length; i++) {
        result += '<tr>';
        result += '<td>' + rows[i].children[0].firstChild.nodeValue + '</td>';
        result += '<td>' + rows[i].children[1].firstChild.nodeValue + '</td>';
        result += '<td>' + rows[i].children[2].firstChild.nodeValue + '</td>';
        result += '<td>' + rows[i].children[3].firstChild.nodeValue + '</td>';
        result += '<td>' + rows[i].children[4].firstChild.nodeValue + '</td>';
        result += '<td>' + rows[i].children[5].firstChild.nodeValue + '</td>';
        result += '</tr>'
      }
      
      out.innerHTML = result;
    }
    else console.log(ajax.status + " - " + ajax.statusText);
    ajax.abort();
  }

}



function Update2() {

  if (ajax.readyState == 4) {
    if (ajax.status == 200) {
      var out = document.getElementById('player');
      out.innerHTML = ajax.responseText;
    }
    else console.log(ajax.status + " - " + ajax.statusText);
    ajax.abort();
  }

}

function Update3() {

  if (ajax.readyState == 4) {
    if (ajax.status == 200) {
      var out = document.getElementById('league');
      out.innerHTML = ajax.responseText;
    }
    else console.log(ajax.status + " - " + ajax.statusText);
    ajax.abort();
  }

}

var ajax = new XMLHttpRequest ();
ajax.open('GET', 'get.php?selector=players', false);
ajax.send();
if(ajax.status == 200) {
  Update2();
}

var ajax = new XMLHttpRequest();
ajax.open('GET', 'get.php?selector=leagues', false);
ajax.send();
if(ajax.status == 200) {
  Update3();
}

