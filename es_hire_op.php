<body style="background-color:powderblue;"><center><img src=emergency_service.png class="center" width="250" height="120"></center>
<form action=es_conf_op.php method=POST>
  Enter details of new operator <hr><br>
  <style>
  table, th, td {
    border: 1px solid black;
  }
  </style>
  <table style=width:80%>
      <tr>
        <th>FIRST NAME
        <th>LAST NAME
        <th>CONTACT NUMBER
        <th>EMAIL
      </tr>
      <tr>
        <th><input type=text name=fname id=fname></input>
        <th><input type=text name=lname id=lname></input>
        <th><input type=text name=contact id=contact></input>
        <th><input type=email name=email id=email></input>
      </tr>
    </table>
    <input type=submit value="Save details"></input>
  </form>
<br><a href=es_man_portal.php >Click to go back to previous page!</a>
<br><a href=es_op_functions.php>Click to go back to functions</a>
