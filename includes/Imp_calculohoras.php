
<table>
  <tr>
    <td><?php 
      $fecha = $fila->FechaHora;
      $Fecha = substr($fecha, 0, 10);
      echo $Fecha;
    ?></td>
    <?php
      // se llama el resultado de la tabla registro Fecha y Hora
      $fecha = $fila->FechaHora;
      // se obtiene el dia de la semana en ingles  
      $dia = date('l', strtotime($fecha));
      // se extrae solo los caracteres correspondientes a la fecha
      $Fecha = substr($fecha, 0, 10);
      // se utiliza este resultado para consultar en la tabla tblfestivos, si la fecha coinicde con un festivo
      $sql6 = "SELECT * FROM tblfestivos WHERE F_festivo='$Fecha'";
      $result6 = mysqli_query($con,$sql6);
      $filas6=mysqli_num_rows($result6);
      // se utiliza un switch con el resultado del dia en ingles, para colocar el dia correspondiente en español
      switch($dia) {
        case "Monday":
            // se comprueba si en esta linea de validacion la fecha concuerda con un festivo y cambiar el fondo a verde
            if ($filas6>0){
              ?><td>
              <?php echo "Lun";
            }
            // Se devuelve las iniciales del dia en español    
            else {
            ?><td>  
            <?php echo "Lun";
            }                      
        break;
        case "Tuesday":
            // se comprueba si en esta linea de validacion la fecha concuerda con un festivo y cambiar el fondo a verde  
            if ($filas6>0){
            ?><td>
            <?php echo "Mar";
            }
            // Se devuelve las iniciales del dia en español        
            else {
            ?><td>  
            <?php echo "Mar";
            }            
        break;
        case "Wednesday":
            // se comprueba si en esta linea de validacion la fecha concuerda con un festivo y cambiar el fondo a verde
            if ($filas6>0){
            ?><td>
            <?php echo "Mie";
            }    
            // Se devuelve las iniciales del dia en español
            else {
            ?><td>  
            <?php echo "Mie";
            }            
        break;
        case "Thursday":
            // se comprueba si en esta linea de validacion la fecha concuerda con un festivo y cambiar el fondo a verde
            if ($filas6>0){
            ?><td>
            <?php echo "Jue";
            }    
            // Se devuelve las iniciales del dia en español
            else {
            ?><td>  
            <?php echo "Jue";
            }            
        break;
        case "Friday":
            // se comprueba si en esta linea de validacion la fecha concuerda con un festivo y cambiar el fondo a verde
            if ($filas6>0){
            ?><td>
            <?php echo "Vie";
            }    
            // Se devuelve las iniciales del dia en español
            else {
            ?><td>  
            <?php echo "Vie";
            }            
        break;
        case "Saturday":
            // se comprueba si en esta linea de validacion la fecha concuerda con un festivo y cambiar el fondo a verde
            if ($filas6>0){
            ?><td>
            <?php echo "Sab";
            }    
            // Se devuelve las iniciales del dia en español
            else {
            ?><td>  
            <?php echo "Sab";
            }            
        break;
        case "Sunday":
            // Como es domingo se cambia el fondo a verde
            ?><td>
            <?php echo "Dom";
        break;
      }
      ?> </td>
    <td><?php 
      $hora1 = $fila->FechaHora;
      // se extrae solo los caracteres de la hora
      $Hora1 = substr($hora1, 11, 8);
      echo $Hora1;?></td>

    <td><?php
      $hora2 = $fila2->FechaHora;
      // se extrae solo los caracteres de la hora
      $Hora2 = substr($hora2, 11, 8);
      echo $Hora2;  
    ?></td>
    
    <?php
      //Consulta resultado campo id_turno
      $idturno= $fila->id_turno;
      //se realiza la consulra a la tabla tblturno por el id_turno del registro
      $sql3 = "SELECT * FROM tblturno WHERE id='$idturno'";
      $result3 = mysqli_query($con,$sql3);
      //se traen los valores de hora de ingreso, salida y almuerzo programados por turno
      while ($fila3 = $result3->fetch_assoc()):
        $hxt = $fila3['HxT'];
        $hiniT = $fila3['H_Inicio'];
        $hfinT = $fila3['H_Fin'];
        $alm = $fila3['T_Almuerzo'];
        $diaini = $fila3['DiaSem'];
        $diafin = $fila3['DiaSemF'];
        $h3 = floatval(substr($hiniT, 0, 2));
        $m3 = floatval((substr($hiniT, 3, 2))/60);
        $s3 = floatval((substr($hiniT, 6, 2))/60);
        $HiniT= floatval(($h3+$m3));
        $h4 = floatval(substr($hfinT, 0, 2));
        $m4 = floatval((substr($hfinT, 3, 2))/60);
        $s4 = floatval((substr($hiniT, 6, 2))/60);
        $HfinT= floatval(($h4+$m4));
        $h5 = floatval(substr($alm, 0, 2));
        $m5 = floatval((substr($alm, 3, 2))/60);
        $Alm= floatval(($h5+$m5));
        //calclulo de hora entrada programada en entero
        $hprog=floatval(($h3+$m3+$s3));
        //calclulo de hora salida programada en entero
        $salprog=floatval(($h4+$m4+$s4));
      endwhile;
      //se llama el documento del usuario consultado
      $Doc = $fila->id_doc;
      //se consulra la tabla tblinfo por el numero de documento
      $sql4 = "SELECT * FROM tblinfo WHERE DOC='$Doc'";
      $result4 = mysqli_query($con,$sql4);
      while ($fila4 = $result4->fetch_assoc()):
        //se llaman el resultado de la columna condiciones
        $condi = $fila4['id_Condic'];
      endwhile;
      //se consulta la tabla tblcondiciones con el id obtenido
      $sql5 = "SELECT * FROM tblcondiciones WHERE id='$condi'";
      $result5 = mysqli_query($con,$sql5);
      //se llaman resultados de Horas por semana, Hora inicio y fin de recargos nocturnos
      while ($fila5 = $result5->fetch_assoc()):
        $hxs = $fila5['HxS'];
        $inrecnoc = $fila5['RecNocIni'];
        $Fnrecnoc = $fila5['RecNocFin'];
        $rnh1 = floatval(substr($inrecnoc, 0, 2));
        $rnh2 = floatval(substr($Fnrecnoc, 0, 2));
        $rnm1 = floatval((substr($inrecnoc, 3, 2))/60);
        $rnm2 = floatval((substr($Fnrecnoc, 3, 2))/60);
        $rns1 = floatval((substr($inrecnoc, 6, 2))/600);
        $rns2 = floatval((substr($Fnrecnoc, 6, 2))/600);
        //calculo de inicio de Recargos nocturnos entero
        $rnini=floatval(($rnh1+$rnm1+$rns1));
        //calculo de Fin de Recargos nocturnos entero
        $rnfin=floatval(($rnh2+$rnm2+$rns2));
      endwhile;
      //consulta Hora ingreso por linea 
      $hora1 = $fila->FechaHora;
      //consulta Hora salida por linea
      $hora2 = $fila2->FechaHora;
      //extraccion de las horas minutos y segundos en valores float
      $th1 = floatval(substr($hora1, 11, 2));
      $h2 = floatval(substr($hora2, 11, 2));
      $tm1 = floatval((substr($hora1, 14, 2))/60);
      $m2 = floatval((substr($hora2, 14, 2))/60);
      $ts1 = floatval((substr($hora1, 17, 2))/600);
      $s2 = floatval((substr($hora2, 17, 2))/600);
      //calculo de hora real entrada entero
      $thini=floatval(($th1+$tm1+$ts1));
      //calculo de hora real salida entero
      $thfin=floatval(($h2+$m2+$s2));
      //Se valida si la hora de entrada es menor a la hora programada en el turno 
      //y se utiliza la programada en el turno
      if($th1<$h3){
        $h1=$h3;
        $m1=$m3;
        $s1=$s3;
      }
      else{
        $h1=$th1;
        $m1=$tm1;
        $s1=$ts1;
      }
      //validacion si la hora de entrada es mayor que la hora de salida 
      if($h1>$h2){
        //se calcula la diferencia entre tiempo de entrada y salida
        if(floatval($thfin)<$rnfin or floatval($thfin)==($rnfin)){
          $hdif= floatval(('24'-$h1+$h2));
          $mdif= floatval(($m2-$m1));
          $sdif= floatval(($s2-$s1));
        }
        else{
          $hdif= floatval(('24'-$h1+$h2));
          $mdif= floatval(($m2-$m1));
          $sdif= floatval(($s2-$s1));  
        }
      }
      else{
        //se calcula la diferencia entre tiempo de entrada y salida
        $hdif= floatval(($h2-$h1));
        $mdif= floatval(($m2-$m1));
        $sdif= floatval(($s2-$s1));
      }
      //Dependiendo del caso resultado, se suman los valores float de horas, minutos y segundos
      $horas= floatval(($hdif+$mdif+$sdif));
      //se valida si la hora de ingreso es posterior a la hora señalada y se cambia el fondo a amarillo
      if (floatval($thini)>floatval($hprog)){
        //se muestra la cantidad neta de horas descontando el tiempo respectivo de almuerzo
        ?><td><?php
        $Horas= floatval($horas)- floatval($Alm);
        echo floatval(round($Horas,2));
      }
      else{
        //se muestra la cantidad neta de horas descontando el tiempo respectivo de almuerzo
        ?><td><?php
        $Horas=floatval($horas)-floatval($Alm);
        echo floatval(round($Horas,2));
      }
    ?>
    </td>
    



    <td><?php
       //se llaman variables de total de horas netas generadas y se compara con las horas programadas por turno
       if(floatval($Horas)>floatval($hxt)){
        //Se valida si la hora de salida fue despues de la hora inicio de recargos noct,          
        if(floatval($thfin)>floatval($rnini)){//aplica hasta las 23:59:59
          //Se valida si la hora de entrada es mayor a la finalizacion de recago nocturno
          if(floatval($thini)>floatval($rnfin)){//aplica desde las 6 a.m
            //se descuenta las diferencia correspondiente a horas extra nocturnas
            $hed=(floatval($Horas)-floatval($hxt))-(floatval($thfin)-floatval($rnini));
            //se valida si el resultado de horas extra diurna es mayor que 0 y se imprime
            if (floatval($hed)>0){
              echo floatval(round($hed,2));
            }
            else{
              echo 0;
            }
          }
          //si la hora de entrada es antes que la finalizacion de recargos nocturnos
          //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
          else{
            $hed=(floatval($Horas)-floatval($hxt))-(floatval($thfin)-floatval($rnini));//aplica despues de las 12 a.m.
            if (floatval($hed)>0){
              echo floatval(round($hed,2));
            }
          }
        }  
        //Si la hora de salida, fue antes del inicio de recargo nocturno
        else{
          //si hora de salida es mayor a hora de entrada
          //siempre que la hora de salida fue antes del inicio de recargo nocturno
          if(floatval($thfin)>floatval($thini)){
            $hed=(floatval($Horas)-floatval($hxt));
            echo floatval(round($hed,2));
          }
          //si la hora de salida es menor a hora de entrada
          //siempre que la hora de salida fue antes del inicio de recargo nocturno
          else{
            //se valida si la hora de entrada es mayor al inicio del recargo nocturno
            //siempre que la hora de salida es menor a hora de entrada
            //siempre que la hora de salida fue antes del inicio de recargo nocturno
            if(floatval($thini)>floatval($rnini)){
              $hed=((floatval($thfin)+24)-(floatval($rnfin)+24));
              echo floatval(round($hed,2));
            }
            else{
              //Se valida si hay horas diurnas antes del inicio de recargo nocturno
              //siempre que la hora de entrada es antes del inicio del recargo nocturno
              //siempre que la hora de salida es menor a hora de entrada
              //siempre que la hora de salida fue antes del inicio de recargo nocturno
              if(floatval($thini)<(floatval($rnini)-floatval($hxt))){
                //se calcula las horas extra diurnas generadas despues del fin del recargo nocturno
                $hed1=((floatval($thfin)+24)-(floatval($rnfin)+24));
                //se calcula las horas extra diurnas generadas antes del inico del recargo nocturno 
                $hed2=(floatval($rnini)-floatval($thini)-floatval($hxt)-floatval($Alm));
                //se valida si las horas extra diurnas generadas despues del fin del recargo nocturno mayores a 0
                //Siempre que haya horas diurnas antes del inicio de recargo nocturno
                //siempre que la hora de entrada es antes del inicio del recargo nocturno
                //siempre que la hora de salida es menor a hora de entrada
                //siempre que la hora de salida fue antes del inicio de recargo nocturno
                if (floatval($hed1)>0){
                  //se suman las anteriores y posteriores al recargo nocturno y se imprimen
                  $hed=(floatval($hed1)+floatval($hed2));
                  echo floatval (roud($hed,2));
                }
                //No hay horas extra diurnas despues del fin del recargo nocturno
                //Siempre que haya horas diurnas antes del inicio de recargo nocturno
                //siempre que la hora de entrada es antes del inicio del recargo nocturno
                //siempre que la hora de salida es menor a hora de entrada
                //siempre que la hora de salida fue antes del inicio de recargo nocturno
                else{
                  $hed=(floatval($hed2));
                  echo floatval(round($hed,2));
                }
                  
              }
              //Siempre que no haya horas extra diurnas antes del inicio de recargo nocturno
              //siempre que la hora de entrada es antes del inicio del recargo nocturno
              //siempre que la hora de salida es menor a hora de entrada
              //siempre que la hora de salida fue antes del inicio de recargo nocturno
              else {
                $hed=((floatval($thfin)+24)-(floatval($rnfin)+24));
                echo floatval(round($hed,2));
              }
            }         
          }
        }
       }
       else{
        echo 0;
       }         
    ?></td>
    <td><?php 
      //se llaman variables de total de horas netas generadas y se compara con las horas programadas por turno
      if(floatval($Horas)>floatval($hxt)){
        //Se valida si la hora de salida fue despues de la hora inicio de recargos noct,          
        if(floatval($thfin)>floatval($rnini)){//aplica hasta las 23:59:59
          //Se valida si la hora de entrada es mayor a la finalizacion de recago nocturno
          //Siempre que la hora de salida fue despues de la hora inicio de recargos noct,
          if(floatval($thini)>floatval($rnfin)){//aplica desde las 6 a.m
            //se descuenta las diferencia correspondiente a horas extra diurnas
            $hed1=(floatval($Horas)-floatval($hxt))-(floatval($thfin)-floatval($rnini));
            //se valida si las horas extra diurnas son mayores a 0
            //Siempre que la hora de entrada es mayor a la finalizacion de recago nocturno
            //Siempre que la hora de salida fue despues de la hora inicio de recargos noct,
            if(floatval($hed1)>0){
              //se calcula el total de horas extra, descontando las horas extra diurnas
              $hen=floatval($Horas)-floatval($hxt)-floatval($hed1);
              //se valida si el resultado de horas extra nocturna es mayor que 0 y se imprime
              //Siempre que las horas extra diurnas son mayores a 0
              //Siempre que la hora de entrada es mayor a la finalizacion de recago nocturno
              //Siempre que la hora de salida fue despues de la hora inicio de recargos noct,
              if (floatval($hen)>0){
                echo floatval(round($hen,2));
              }
              else{
                echo 0;
              }
            }
            //No hay horas extra diurnas
            //Siempre que la hora de entrada es mayor a la finalizacion de recago nocturno
            //Siempre que la hora de salida fue despues de la hora inicio de recargos noct,
            else{
              //se calcula el tiempo realizado despues del inicio del recargo nocturno
              $tdrn=floatval($thfin)-floatval($rnini);
              //se calcula las horas extra totales
              $het=floatval($Horas)-floatval($hxt);
              //Se caclula si el tiempo realizado despues del inicio del recargo nocturno es mayor a total de horas extra.
              //Siempre que no haya horas extra diurnas
              //Siempre que la hora de entrada es mayor a la finalizacion de recago nocturno
              //Siempre que la hora de salida fue despues de la hora inicio de recargos noct,
              if(floatval($tdrn)>floatval($het)){
                $hen=(floatval($het));
                if(floatval($hen)>0){
                  echo floatval(round($hen,2));  
                }
                else{
                  echo 0;
                }
              }
              else{
                //El tiempo realizado despues del inicio del recargo nocturno es menor a total de horas extra.
                //Siempre que no haya horas extra diurnas
                //Siempre que la hora de entrada es mayor a la finalizacion de recago nocturno
                //Siempre que la hora de salida fue despues de la hora inicio de recargos noct,
                $hen=(floatval($tdrn));
                if(floatval($hen)>0){
                  echo floatval(round($hen,2));  
                }
                else{
                  echo 0;
                }
              }
            }
          }
          //si la hora de entrada es antes que la finalizacion de recargos nocturnos
          //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
          else{
            //Si la hora del fin de recago nocturno es mayor a las horas por tuno
            //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
            //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
            if(floatval($rnfin)>floatval($hxt)){
              //se calcula las horas extra nocturnas realizadas en la mañana
              $henam=(floatval($rnfin)-floatval($hxt));//aplica despues de las 12 a.m.
              //se calcula las horas extra nocturnas realizadas en la noche
              $henpm=(floatval($thfin)-floatval($rnini));
              //Si las horas extra totales son mayores a las horas extra nocturnas p.m
              //Siempre que la hora del fin de recago nocturno es mayor a las horas por tuno
              //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
              //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
              if((floatval($Horas)-floatval($hxt))>floatval($henpm)){
                //si las horas extra nocturnas am son mayores que 0
                //Siempre que las horas extra totales son mayores a las horas extra nocturnas p.m
                //Siempre que la hora del fin de recago nocturno es mayor a las horas por tuno
                //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
                //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
                if(floatval($henam)>0){
                  //se suman las horas extras nocturas am y pm, y se imprime
                  $hen=floatval($henam)+floatval($henpm);
                  if(floatval($hen)>0){
                    echo floatval(round($hen,2));  
                  }
                  else{
                    echo 0;
                  }
                }
                //No hay horas extra nocturnas am
                //Si las horas extra totales son mayores a las horas extra nocturnas p.m
                //Siempre que la hora del fin de recago nocturno es mayor a las horas por tuno
                //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
                //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
                else{
                  $hen=floatval($henpm);
                  if(floatval($hen)>0){
                    echo floatval(round($hen,2));  
                  }
                  else{
                    echo 0;
                  }
                }
              }
              //las horas extra totales son menores a las horas extra nocturnas p.m
              //Siempre que la hora del fin de recago nocturno es mayor a las horas por tuno
              //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
              //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
              else{
                $hen=floatval($Horas)-floatval($hxt);
                if(floatval($hen)>0){
                  echo floatval(round($hen,2));  
                }
                else{
                  echo 0;
                }
              }
            }
            //Si la hora del fin de recago nocturno es menor a las horas por tuno
            //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
            //siempre que la hora de salida fue despues de la hora inicio de recargos noct, 
            else{
              //Si las horas extra totales son mayores a las horas extra nocturnas p.m
              //Siempre que la hora del fin de recago nocturno es menor a las horas por tuno
              //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
              //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
              $henpm=(floatval($thfin)-floatval($rnini));
              if((floatval($Horas)-floatval($hxt))>floatval($henpm)){
                $hen=floatval($henpm);
                if(floatval($hen)>0){
                  echo floatval(round($hen,2));  
                }
                else{
                  echo 0;
                }  
              }  
              else{
                //Si las horas extra totales son menores a las horas extra nocturnas p.m
                //Siempre que la hora del fin de recago nocturno es menor a las horas por tuno
                //siempre que la hora de entrada es menor que la finalizacion de recargos nocturnos
                //siempre que la hora de salida fue despues de la hora inicio de recargos noct,
                $hen=floatval($Horas)-floatval($hxt);
                if(floatval($hen)>0){
                  echo floatval(round($hen,2));  
                }
                else{
                  echo 0;
                }
              }
            }                        
          }
        }  
        //Si la hora de salida, fue antes del inicio de recargo nocturno
        else{
          //si hora de salida es mayor a hora de entrada
          //siempre que la hora de salida fue antes del inicio de recargo nocturno
          if(floatval($thfin)>floatval($thini)){
            //Si el inicio del recarho nocturno es mayor a las horas por turno
            //Siempre que la hora se dalida es mayor a hora de entrada
            //siempre que la hora de salida fue antes del inicio de recargo nocturno
            if(floatval($rnini)>floatval($hxt)){
              $hen= floatval($rnfin)-floatval($thini)-floatval($hxt);
              if(floatval($hen)>0){
                echo floatval(round($hen,2));  
              }
              else{
                echo 0;
              }
            }
            else{
              echo 0;
            }
          }
          //si la hora de salida es menor a hora de entrada
          //siempre que la hora de salida fue antes del inicio de recargo nocturno
          else{
            //se valida si la hora de entrada es mayor al inicio del recargo nocturno
            //siempre que la hora de salida es menor a hora de entrada
            //siempre que la hora de salida fue antes del inicio de recargo nocturno
            if(floatval($thini)>floatval($rnini)){
              //Si hora de salida es menor a finalizacion del recargo nocturno
              //Siempre que la hora de entrada es mayor al inicio del recargo nocturno
              //siempre que la hora de salida es menor a hora de entrada
              //siempre que la hora de salida fue antes del inicio de recargo nocturno
              if(floatval($thfin)<floatval($rnfin)){
                $hen=((floatval($thfin)+24)-floatval($rnini)-floatval($hxt)-floatval($Alm));
                if(floatval($hen)>0){
                  echo floatval(round($hen,2));  
                }
                else{
                  echo 0;
                }  
              }
              //La Hora de salida es mayor a finalizacion del recargo nocturno
              //Siempre que la hora de entrada es mayor al inicio del recargo nocturno
              //siempre que la hora de salida es menor a hora de entrada
              //siempre que la hora de salida fue antes del inicio de recargo nocturno
              else{
                //se calcula las horas extra totales y se restan las causadas despues del fin del recargo noct
                $hen=(floatval($Horas)-floatval($hxt)-((floatval($thfin)+24)-(floatval($rnfin)+24)));
                if(floatval($hen)>0){
                  echo floatval(round($hen,2));  
                }
                else{
                  echo 0;
                }  
              }
              
            }
            //siempre que la hora de entrada es antes del inicio del recargo nocturno
            //siempre que la hora de salida es menor a hora de entrada
            //siempre que la hora de salida fue antes del inicio de recargo nocturno
            else{
              //Se valida si hay horas extra diurnas antes del inicio de recargo nocturno
              //siempre que la hora de entrada es antes del inicio del recargo nocturno
              //siempre que la hora de salida es menor a hora de entrada
              //siempre que la hora de salida fue antes del inicio de recargo nocturno
              if(floatval($thini)<(floatval($rnini)-floatval($hxt))){
                //si la hora de salida es mayor al fin de recargo nocturno
                //Siempre que haya horas extra diurnas antes del inicio de recargo nocturno
                //siempre que la hora de entrada es antes del inicio del recargo nocturno
                //siempre que la hora de salida es menor a hora de entrada
                //siempre que la hora de salida fue antes del inicio de recargo nocturno  
                if(floatval($thfin)>floatval($rnfin)){
                  //secalcula las horas extra diurnas despues del fin del recargo nocturno 
                  $hed=floatval($thfin)-floatval($rnfin);
                  $hen=(((floatval($Horas))-(floatval($hxt)))-floatval($hed));
                  if(floatval($hen)>0){
                    echo floatval(round($hen,2));  
                  }
                  else{
                    echo 0;
                  }  
                }
                //No hay horas extra diurnas despues del fin del recargo nocturno
                //Siempre que haya horas diurnas antes del inicio de recargo nocturno
                //siempre que la hora de entrada es antes del inicio del recargo nocturno
                //siempre que la hora de salida es menor a hora de entrada
                //siempre que la hora de salida fue antes del inicio de recargo nocturno
                else{
                  $hen=((floatval($thfin)+24)-(floatval($rnini)));
                  if(floatval($hen)>0){
                    echo floatval(round($hen,2));  
                  }
                  else{
                    echo 0;
                  }  
                }
                  
              }
              //Siempre que no haya horas extra diurnas antes del inicio de recargo nocturno
              //siempre que la hora de entrada es antes del inicio del recargo nocturno
              //siempre que la hora de salida es menor a hora de entrada
              //siempre que la hora de salida fue antes del inicio de recargo nocturno
              else {
                //si la hora de salida es mayor al fin de recargo nocturno
                //Siempre que no haya horas extra diurnas antes del inicio de recargo nocturno
                //siempre que la hora de entrada es antes del inicio del recargo nocturno
                //siempre que la hora de salida es menor a hora de entrada
                //siempre que la hora de salida fue antes del inicio de recargo nocturno
                if(floatval($thfin)>floatval($rnfin)){
                  //secalcula las horas extra diurnas despues del fin del recargo nocturno
                  $hed=floatval($thfin)-floatval($rnfin);
                  $hen=(((floatval($Horas))-(floatval($hxt)))-floatval($hed));
                  if(floatval($hen)>0){
                    echo floatval(round($hen,2));  
                  }
                  else{
                    echo 0;
                  }
                }
                //la hora de salida es menor al fin de recargo nocturno
                //Siempre que no haya horas extra diurnas antes del inicio de recargo nocturno
                //siempre que la hora de entrada es antes del inicio del recargo nocturno
                //siempre que la hora de salida es menor a hora de entrada
                //siempre que la hora de salida fue antes del inicio de recargo nocturno
                else{                   
                  //se calcula la hora de entrada mas las horas programadas es mayor que inicio rec noc
                  //Siempre que la hora de salida es menor al fin de recargo nocturno
                  //Siempre que no haya horas extra diurnas antes del inicio de recargo nocturno
                  //siempre que la hora de entrada es antes del inicio del recargo nocturno
                  //siempre que la hora de salida es menor a hora de entrada
                  //siempre que la hora de salida fue antes del inicio de recargo nocturno
                  $hen=floatval($thini)+floatval($Horas)-floatval($hxt);
                  if(floatval($hen)>0){
                    echo floatval(round($hen,2));  
                  }
                  else{
                    echo 0;
                  }
                }  
              }
            }         
          }
        }
      }
      else{
        echo 0;
      }  
        
      ?></td>

    <td><?php 
      echo floatval(round($thini,2));
    ?></td>
    <td><?php 
      echo floatval(round($thfin,2));
    ?></td>
    <td><?php
      echo floatval(round($rnini,2));
    ?></td>
    <td><?php 
      echo floatval(round($rnfin,2));
    ?></td>
    <td><?php 
      echo floatval(round($h1));
    ?></td>
    <td><?php
      echo floatval(round($h2));
    ?></td>
    <td><?php 
      echo floatval(round($rnfin));
    ?></td>
    </tr>
