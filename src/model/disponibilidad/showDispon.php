<?php
session_start();
include_once('../../../init.php');

use Horarios\model\disponibilidad\disponibilidadDB;

$user = $_POST["user"] ?? $_SESSION["usuario"];

$ddb = new disponibilidadDB($_SESSION["tipo"]);

$dias = ["Lu", "Ma", "Mi", "Ju", "Vi", "Sa"];

$r = $ddb->getUserDisponibilidadFormat($user);
?>

<table class="table table-bordered" style="margin-left: 15%">
  <tbody>
    <tr>
      <th></th>
      <th>Lunes</th>
      <th>Martes</th>
      <th>Miércoles</th>
      <th>Jueves</th>
      <th>Viernes</th>
      <th>Sábado</th>
    </tr>
    <tr>
      <th>7:00 - 7:54</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 1 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }

        }
      ?>
    </tr>
    <tr>
      <th>7:55 - 8:49</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 2 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>8:50 - 9:44</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 3 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>9:45 - 10:39</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 4 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>10:40 - 11:09</th>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
    </tr>
    <tr>
      <th>11:10 - 12:04</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 5 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>12:05 - 12:59</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 6 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>13:00 - 13:54</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 7 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>14:00 - 14:54</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 8 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>14:55 - 15:49</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 9 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>15:50 - 16:44</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 10 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>16:45 - 17:39</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 11 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>17:40 - 18:00</th>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
      <td class="receso">R E C E S O</td>
    </tr>
    <tr>
      <th>18:00 - 18:54</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 12 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>18:55 - 19:49</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 13 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
    <tr>
      <th>19:50 - 20:44</th>
      <?php
        foreach($dias as $dia)
        {
          $aux = 14 . "_" . $dia;
          if (in_array($aux,$r))
          {
            echo "<td bgcolor=\"#37B652\"><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
          else {
            echo "<td><button class=\"botonHora\" id=\"" . $aux . "\" ></button></td>";
          }
        }
      ?>
    </tr>
  </tbody>
</table>
