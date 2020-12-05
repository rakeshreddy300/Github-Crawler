<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
require_once('simple_html_dom.php');
$username = $_GET['user'];
$url = "https://github.com/".$username."?tab=repositories";

$html = file_get_html($url);
$i=0;
echo "<tr>
        <th class='rank'>s.no</th>
        <th class='Name'>Name</th>
        <th class='language'>language</th>
        <th class='members'>members</th>
        <th class='stars'>stars</th>
        <th class='pulls'>pulls</th>
    </tr>";
if(!$html->find('h3.wb-break-all',0)){
    echo "<tr>
            <td class='rank'>no data</td>
            <td class='Name'>no data</td>
            <td class='language'>no data</td>
            <td class='members'>no data</td>
            <td class='stars'>no data</td>
            <td class='pulls'>no data</td>
        </tr>
    ";
}
while($html->find('h3.wb-break-all',$i)){
    echo "<tr>";
    echo "<td class='rank'>".$i."</td>";

    echo $html->find('h3.wb-break-all',$i) ?
    "<td class='Name'>".$html->find('h3.wb-break-all',$i)->plaintext."</td>": "<td>no data</td>";

    echo $html->find('[itemprop=programmingLanguage]',$i) ?
    "<td class='language'>".$html->find('[itemprop=programmingLanguage]',$i)->plaintext."</td>": "<td>no data</td>";

    echo $html->find('[href$=members]',$i) ?
    "<td class='members'>".$html->find('[href$=members]',$i)->plaintext."</td>": "<td>no data</td>";

    echo $html->find('[href$=stargazers]',$i) ?
    "<td class='stars'>".$html->find('[href$=stargazers]',$i)->plaintext."</td>": "<td>no data</td>";

    echo $html->find('[href$=pulls]',$i) ?
    "<td class='pulls'>".$html->find('[href$=pulls]',$i)->plaintext."</td>": "<td>no data</td>";

    echo "</tr>";
    $i++;
}

?>









































// for($i=0; $i < $num; $i++){
//     echo "<div class='table-row'>";
//     echo "<div class='rank'>".$html->find('div.rank',$i)->plaintext."</div>";
//     echo "<div class='personName'>".$html->find('div.personName',$i)->plaintext."</div>";
//     echo "<div class='net'>".$html->find('div.netWorth',$i)->plaintext."</div>";
//     echo "<div class='age'>".$html->find('div.age',$i)->plaintext."</div>";
//     echo "<div class='country'>".$html->find('div.countryofCitizenship',$i)->plaintext."</div>";
//     echo "<div class='source'>".$html->find('div.source',$i)->plaintext."</div>";
//     echo "<div class='industries'>".$html->find('div.industries',$i->plaintext)."</div>";
//     echo "</div>";
// }




?>
</body>
</html>

