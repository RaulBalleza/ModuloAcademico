<?php
session_start();
include_once ('init.php');

$isLogged = $_SESSION["islogged"] ?? FALSE;

if (!$isLogged)
{
  header("Location: logout.php");
  exit;
}
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
      <td><button class="botonHora" id="1_Lu" ></button></td>
      <td><button class="botonHora" id="1_Ma" ></button></td>
      <td><button class="botonHora" id="1_Mi" ></button></td>
      <td><button class="botonHora" id="1_Ju" ></button></td>
      <td><button class="botonHora" id="1_Vi" ></button></td>
      <td><button class="botonHora" id="1_Sa" ></button></td>
    </tr>
    <tr>
      <th>7:55 - 8:49</th>
      <td><button class="botonHora" id="2_Lu" ></button></td>
      <td><button class="botonHora" id="2_Ma" ></button></td>
      <td><button class="botonHora" id="2_Mi" ></button></td>
      <td><button class="botonHora" id="2_Ju" ></button></td>
      <td><button class="botonHora" id="2_Vi" ></button></td>
      <td><button class="botonHora" id="2_Sa" ></button></td>
    </tr>
    <tr>
      <th>8:50 - 9:44</th>
      <td><button class="botonHora" id="3_Lu" ></button></td>
      <td><button class="botonHora" id="3_Ma" ></button></td>
      <td><button class="botonHora" id="3_Mi" ></button></td>
      <td><button class="botonHora" id="3_Ju" ></button></td>
      <td><button class="botonHora" id="3_Vi" ></button></td>
      <td><button class="botonHora" id="3_Sa" ></button></td>
    </tr>
    <tr>
      <th>9:45 - 10:39</th>
      <td><button class="botonHora" id="4_Lu" ></button></td>
      <td><button class="botonHora" id="4_Ma" ></button></td>
      <td><button class="botonHora" id="4_Mi" ></button></td>
      <td><button class="botonHora" id="4_Ju" ></button></td>
      <td><button class="botonHora" id="4_Vi" ></button></td>
      <td><button class="botonHora" id="4-Sa" ></button></td>
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
      <td><button class="botonHora" id="5_Lu" ></button></td>
      <td><button class="botonHora" id="5_Ma" ></button></td>
      <td><button class="botonHora" id="5_Mi" ></button></td>
      <td><button class="botonHora" id="5_Ju" ></button></td>
      <td><button class="botonHora" id="5_Vi" ></button></td>
      <td><button class="botonHora" id="5_Sa" ></button></td>
    </tr>
    <tr>
      <th>12:05 - 12:59</th>
      <td><button class="botonHora" id="6_Lu" ></button></td>
      <td><button class="botonHora" id="6_Ma" ></button></td>
      <td><button class="botonHora" id="6_Mi" ></button></td>
      <td><button class="botonHora" id="6_Ju" ></button></td>
      <td><button class="botonHora" id="6_Vi" ></button></td>
      <td><button class="botonHora" id="6_Sa" ></button></td>
    </tr>
    <tr>
      <th>13:00 - 13:54</th>
      <td><button class="botonHora" id="7_Lu" ></button></td>
      <td><button class="botonHora" id="7_Ma" ></button></td>
      <td><button class="botonHora" id="7_Mi" ></button></td>
      <td><button class="botonHora" id="7_Ju" ></button></td>
      <td><button class="botonHora" id="7_Vi" ></button></td>
      <td><button class="botonHora" id="7_Sa" ></button></td>
    </tr>
    <tr>
      <th>14:00 - 14:54</th>
      <td><button class="botonHora" id="8_Lu" ></button></td>
      <td><button class="botonHora" id="8_Ma" ></button></td>
      <td><button class="botonHora" id="8_Mi" ></button></td>
      <td><button class="botonHora" id="8_Ju" ></button></td>
      <td><button class="botonHora" id="8_Vi" ></button></td>
      <td><button class="botonHora" id="8_Sa" ></button></td>
    </tr>
    <tr>
      <th>14:55 - 15:49</th>
      <td><button class="botonHora" id="9_Lu" ></button></td>
      <td><button class="botonHora" id="9_Ma" ></button></td>
      <td><button class="botonHora" id="9_Mi" ></button></td>
      <td><button class="botonHora" id="9_Ju" ></button></td>
      <td><button class="botonHora" id="9_Vi" ></button></td>
      <td><button class="botonHora" id="9_Sa" ></button></td>
    </tr>
    <tr>
      <th>15:50 - 16:44</th>
      <td><button class="botonHora" id="10_Lu" ></button></td>
      <td><button class="botonHora" id="10_Ma" ></button></td>
      <td><button class="botonHora" id="10_Mi" ></button></td>
      <td><button class="botonHora" id="10_Ju" ></button></td>
      <td><button class="botonHora" id="10_Vi" ></button></td>
      <td><button class="botonHora" id="10_Sa" ></button></td>
    </tr>
    <tr>
      <th>16:45 - 17:39</th>
      <td><button class="botonHora" id="11_Lu" ></button></td>
      <td><button class="botonHora" id="11_Ma" ></button></td>
      <td><button class="botonHora" id="11_Mi" ></button></td>
      <td><button class="botonHora" id="11_Ju" ></button></td>
      <td><button class="botonHora" id="11_Vi" ></button></td>
      <td><button class="botonHora" id="11_Sa" ></button></td>
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
      <td><button class="botonHora" id="12_Lu" ></button></td>
      <td><button class="botonHora" id="12_Ma" ></button></td>
      <td><button class="botonHora" id="12_Mi" ></button></td>
      <td><button class="botonHora" id="12_Ju" ></button></td>
      <td><button class="botonHora" id="12_Vi" ></button></td>
      <td><button class="botonHora" id="12_Sa" ></button></td>
    </tr>
    <tr>
      <th>18:55 - 19:49</th>
      <td><button class="botonHora" id="13_Lu" ></button></td>
      <td><button class="botonHora" id="13_Ma" ></button></td>
      <td><button class="botonHora" id="13_Mi" ></button></td>
      <td><button class="botonHora" id="13_Ju" ></button></td>
      <td><button class="botonHora" id="13_Vi" ></button></td>
      <td><button class="botonHora" id="13_Sa" ></button></td>
    </tr>
    <tr>
      <th>19:50 - 20:44</th>
      <td><button class="botonHora" id="14_Lu" ></button></td>
      <td><button class="botonHora" id="14_Ma" ></button></td>
      <td><button class="botonHora" id="14_Mi" ></button></td>
      <td><button class="botonHora" id="14_Ju" ></button></td>
      <td><button class="botonHora" id="14_Vi" ></button></td>
      <td><button class="botonHora" id="14_Sa" ></button></td>
    </tr>
  </tbody>
</table>
