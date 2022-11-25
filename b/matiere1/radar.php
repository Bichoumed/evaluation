<?php

function score($axe){
  $connection = mysqli_connect('localhost','root','','evaluation');
  $sql_s = "SELECT scores from reponse where codematieres = 'DEV12' and numaxe =".$axe;
  $s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
  $query_s = mysqli_query($connection,$sql_s);
  while($rep = mysqli_fetch_assoc($query_s)){
     $s[$rep['scores']]++;
  }
  
  return round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2)  ;

}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>DevExtreme Demo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.6/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.6/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/22.1.6/js/dx.all.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="index.js"></script>

    <script>
      $(() => {
  $('#char').dxPolarChart({
    dataSource,
    useSpiderWeb: true,
    series: [
             { valueField: 'max', name: 'Max' },
             { valueField: 'seuil', name: 'Seuil' },
             { valueField: 'DEV12', name: 'DEV12' },
             { valueField: 'null', name: 'Null' }],
    commonSeriesSettings: {
      type: 'line',
    },
    export: {
      enabled: true,
    },
    title: '',
    tooltip: {
      enabled: true,
    },
  });
});


const dataSource = [{
  arg: 'axe1',
  max: 100,
  seuil: 60,
  DEV12: <?php echo score(1)?>,
  null: 0,
}, {
  arg: 'axe2',
  max: 100,
  seuil: 60,
  DEV12: <?php echo score(2)?>,
  null: 0,
}, {
  arg: 'axe3',
  max: 100,
  seuil: 60,
  DEV12: <?php echo score(3)?>,
  null: 0,
}, {
  arg: 'axe4',
  max: 100,
  seuil: 60,
  DEV12: <?php echo score(4)?>,
  null: 0,
}, {
  arg: 'axe5',
  max: 100,
  seuil: 60,
  DEV12: <?php echo score(5)?>,
  null: 0,
  }, {
  arg: 'axe6',
  max: 100,
  seuil: 60,
  DEV12: <?php echo score(6)?>,
  null: 0,

}];

    </script>
  </head>
  <body class="dx-viewport">
    <div class="demo-container">
      <div id="char"></div>
    </div>
  </body>
</html>
