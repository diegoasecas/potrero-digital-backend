<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicio N° 5 / Estructuras de control - Bucles</title>
</head>
<body>
    <h1>Ejercicio N° 5 / Estructuras de control - Bucles</h1>

    <div class="container">
    
        <!-- fila 1 -->
        <div class="cell"></div>
        
        <div class="cell">
            <h2>for</h2>
        </div>
        
        <div class="cell">
            <h2>while</h2>
        </div>
        
        <div class="cell">
            <h2>do ... while</h2>
        </div>


        <!-- fila 2 -->
        <!-- consigna -->
        <div class="cell cell-title">1. Mostrar los números del 1 al 100</div>
        
        <!-- for -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;for ($i = 1; $i < 101; $i++) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    for ($i = 1; $i < 101; $i++) {
                    echo "$i <br>";
                    }
                ?>
            </div>
        </div>
        
        <!-- while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 1;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;while ($i < 101) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$i++;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 1;

                    while($i < 101) {
                      echo "$i <br>";
                      $i++;
                    }
                ?>
            </div>
        </div>
  
        <!-- do ... while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 1;<br />
                &nbsp;&nbsp;do {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;$i++;<br>
                &nbsp;&nbsp;} while ($i < 101)<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 1;

                    do {
                      echo "$i <br>";
                      $i++;
                    } while ($i < 101);
                ?>
            </div>
        </div>


        <!-- fila 3 -->
        <!-- consigna -->
        <div class="cell cell-title">2) Mostrar los números del 100 al 1</div>
        
        <!-- for -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;for ($i = 100; $i > 0; $i--) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    for ($i = 100; $i > 0; $i--) {
                    echo "$i <br>";
                    }
                ?>
            </div>
        </div>
        
        <!-- while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 100;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;while ($i > 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$i--;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 100;

                    while($i > 0) {
                      echo "$i <br>";
                      $i--;
                    }
                ?>
            </div>
        </div>
  
        <!-- do ... while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 100;<br />
                &nbsp;&nbsp;do {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;$i--;<br>
                &nbsp;&nbsp;} while ($i > 0)<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 100;

                    do {
                      echo "$i <br>";
                      $i--;
                    } while ($i > 0);
                ?>
            </div>
        </div>


        <!-- fila 4 -->        
        <!-- consigna -->
        <div class="cell cell-title">3) Mostrar los números pares del 1 al 100</div>
        
        <!-- for -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;for ($i = 1; $i < 101 0; $i++) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 == 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                &nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    for ($i = 1; $i < 101; $i++) {
                        if ($i % 2 == 0) {
                            echo "$i <br>";
                        }
                    }
                ?>
            </div>
        </div>
        
        <!-- while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 1;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;while ($i < 101) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 == 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$i++;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 1;

                    while($i < 101) {
                        if ($i % 2 == 0) {
                            echo "$i <br>";
                        }
                      $i++;
                    }
                ?>
            </div>
        </div>
  
        <!-- do ... while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 1;<br />
                &nbsp;&nbsp;do {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 == 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
                &nbsp;&nbsp;&nbsp;&nbsp;$i++;<br>
                &nbsp;&nbsp;} while ($i < 101)<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 1;

                    do {
                        if ($i % 2 == 0) {
                            echo "$i <br>";
                        }
                      $i++;
                    } while ($i < 101);
                ?>
            </div>
        </div>


        <!-- fila 5 -->        
        <!-- consigna -->
        <div class="cell cell-title">4) Mostrar los números impares del 1 al 100</div>
        
        <!-- for -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;for ($i = 1; $i < 101 0; $i++) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 != 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                &nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    for ($i = 1; $i < 101; $i++) {
                        if ($i % 2 != 0) {
                            echo "$i <br>";
                        }
                    }
                ?>
            </div>
        </div>
        
        <!-- while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 1;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;while ($i < 101) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 != 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$i++;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 1;

                    while($i < 101) {
                        if ($i % 2 != 0) {
                            echo "$i <br>";
                        }
                      $i++;
                    }
                ?>
            </div>
        </div>
  
        <!-- do ... while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$i = 1;<br />
                &nbsp;&nbsp;do {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 != 0) {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "$i&#60;br>";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
                &nbsp;&nbsp;&nbsp;&nbsp;$i++;<br>
                &nbsp;&nbsp;} while ($i < 101)<br>
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $i = 1;

                    do {
                        if ($i % 2 != 0) {
                            echo "$i <br>";
                        }
                      $i++;
                    } while ($i < 101);
                ?>
            </div>
        </div>


        <!-- fila 6 -->        
        <!-- consigna -->
        <div class="cell cell-title">5) Mostrar la suma de los números de 1 a 20</div>
        
        <!-- for -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$n = 1;<br />
                &nbsp;&nbsp;echo "$n&#60;br />";<br />
                <br />  
                &nbsp;&nbsp;for ($i = 2; $i <21; $i++) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;$n = $n + $i;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;echo "+ $i = $n&#60;br />";<br />
                &nbsp;&nbsp;}<br />

                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $n = 1;                    
                    echo "$n<br />";
                    for ($i = 2; $i <21; $i++) {
                        
                        $n = $n + $i;
                        echo "+ $i = $n<br />";
                        }
                ?>
            </div>
        </div>
        
        <!-- while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$n = 1;<br />
                &nbsp;&nbsp;$i = 2;<br />
                &nbsp;&nbsp;echo "$n&#60;br />";<br />
                <br />
                &nbsp;&nbsp;while ($i < 21) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;$n = $n + $i;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;echo "+ $i = $n&#60;br />";<br />
                &nbsp;&nbsp;&nbsp;&nbsp;$i++;<br />
                &nbsp;&nbsp;}<br />
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $n = 1;
                    $i = 2;
                    
                    echo "$n<br />";
                    
                    while ($i < 21) {
                        $n = $n + $i;
                        echo "+ $i = $n<br />";
                        $i++;
                    }
                ?>
            </div>
        </div>
  
        <!-- do ... while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$n = 1;<br />
                &nbsp;&nbsp;$i = 2;<br />
                &nbsp;&nbsp;echo "$n&#60;br />";<br />
                <br />
                &nbsp;&nbsp;do {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;$n = $n + $i;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;echo "+ $i = $n&#60;br />";<br />
                &nbsp;&nbsp;&nbsp;&nbsp;$i++;<br />
                &nbsp;&nbsp;} while ($i < 21)<br />
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $n = 1;
                    $i = 2;
                    
                    echo "$n<br />";
                    
                    do {
                        $n = $n + $i;
                        echo "+ $i = $n<br />";
                        $i++;
                    } while ($i < 21);
                ?>
            </div>
        </div>


        <!-- fila 7 -->        
        <!-- consigna -->
        <div class="cell cell-title">6) Mostrar la suma de los números pares de 1 a 20</div>
        
        <!-- for -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$n = 2;<br />
                &nbsp;&nbsp;echo "$n&#60;br />";<br />
                <br />
                &nbsp;&nbsp;for ($i = 3; $i < 21; $i++) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 == 0) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$n = $n + $i;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "+ $i = $n&#60;br />";<br />
                &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                &nbsp;&nbsp;}<br />
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $n = 2;
                    echo "$n<br />";

                    for ($i = 3; $i <21; $i++) {
                        if ($i % 2 == 0) {
                            $n = $n + $i;
                            echo "+ $i = $n<br />";
                        }
                    }
                ?>
            </div>
        </div>
        
        <!-- while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$n = 2;<br />
                &nbsp;&nbsp;$i = 3;<br />
                &nbsp;&nbsp;echo "$n&#60;br />";<br />
                <br />                    
                &nbsp;&nbsp;while ($i < 21) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 == 0) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$n = $n + $i;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "+ $i = $n&#60;br />";<br />
                &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                &nbsp;&nbsp;&nbsp;&nbsp;$i++;<br />
                &nbsp;&nbsp;}<br />
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $n = 2;
                    $i = 3;
                    
                    echo "$n<br />";
                    
                    while ($i < 21) {
                        if ($i % 2 == 0) {
                            $n = $n + $i;
                            echo "+ $i = $n<br />";
                        }
                        $i++;
                    }
                ?>
            </div>
        </div>
  
        <!-- do ... while -->
        <div class="cell">
            <div class="cell-title">Código:</div>
            
            <div class="code">
                &#60;?php<br />
                &nbsp;&nbsp;$n = 2;<br />
                &nbsp;&nbsp;$i = 3;<br />
                &nbsp;&nbsp;echo "$n&#60;br />";<br />
                <br />                    
                &nbsp;&nbsp;do {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;if ($i % 2 == 0) {<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$n = $n + $i;<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo "+ $i = $n&#60;br />";<br />
                &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                &nbsp;&nbsp;&nbsp;&nbsp;$i++;<br />
                &nbsp;&nbsp;} while ($i < 21)<br />
                ?&#62;
            </div>
            
            <div class="cell-title">Output:</div>
            <div class="output">
                <?php
                    $n = 2;
                    $i = 3;
                    
                    echo "$n<br />";
                    
                    do {
                        if ($i % 2 == 0) {
                            $n = $n + $i;
                            echo "+ $i = $n<br />";
                        }
                        $i++;
                    } while ($i < 21)
                ?>
            </div>
        </div>

    </div>
</body>
</html>