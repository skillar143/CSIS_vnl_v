<?php



function backup_tables($host, $user, $pass, $name, $tables = '*') {
  $link = mysqli_connect($host, $user, $pass, $name);
  mysqli_query($link, "SET NAMES 'utf8'");
  $return = '';
  if($tables == '*') {
      $tables = array();
      $result = mysqli_query($link, 'SHOW TABLES');
      while($row = mysqli_fetch_row($result)) {
          $tables[] = $row[0];
      }
  } else {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  foreach($tables as $table) {
      $result = mysqli_query($link, 'SELECT * FROM '.$table);
      $num_fields = mysqli_num_fields($result);
      $return.= 'DROP TABLE '.$table.';';
      $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      for ($i = 0; $i < $num_fields; $i++) {
          while($row = mysqli_fetch_row($result)) {
              $return.= 'INSERT INTO '.$table.' VALUES(';
              for($j=0; $j < $num_fields; $j++) {
                  $row[$j] = addslashes($row[$j]);
                  $row[$j] = str_replace("\n","\\n",$row[$j]);
                  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                  if ($j < ($num_fields-1)) { $return.= ','; }
              }
              $return.= ");\n";
          }
      }
      $return.="\n\n\n";
  }
$fname = $_POST['filename'];

  $handle = fopen('sql_backups/'.$fname.'.sql','w+');
  fwrite($handle,$return);
  fclose($handle);
  header("Location: ../admin/management/index.admin.php?success=Exported");
  exit;
}

function import_sql($host, $user, $pass, $dbname, $sqlfile) {
  $link = mysqli_connect($host, $user, $pass, $dbname);
  mysqli_query($link, "SET NAMES 'utf8'");
  $query = '';
  $lines = file($sqlfile);
  foreach ($lines as $line) {
      if (substr($line, 0, 2) == '--' || $line == '') {
          continue;
      }
      $query .= $line;
      if (substr(trim($line), -1, 1) == ';') {
          mysqli_query($link, $query) or print('Error performing query \'<strong>' . $query . '\': ' . mysqli_error($link) . '<br /><br />');
          $query = '';
      }
  }
  mysqli_close($link);
  header("Location: ../admin/management/index.admin.php?success=Imported");
}


if(isset($_POST["backup"])){
    backup_tables("localhost","root","","studentsystem");
  }
  

if(isset($_POST["import"])){
  $sqlfile = $_FILES['sqlfile']['tmp_name'];
  import_sql("localhost","root","","studentsystem", $sqlfile);

}
