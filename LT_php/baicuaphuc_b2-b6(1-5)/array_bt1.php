<?
function ShowArray($arr){ ?>
    <table border="1">
        <tr>
            <th>Index</th>
            <th>Value</th>
        </tr>
        <?
        $index = 0; 
        foreach($arr as $x) ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $x ?></td>
        </tr>
    </table>
<?
}
?>