<?php
/**
 * Created by PhpStorm.
 * User: marvin
 * Date: 16/10/2017
 * Time: 1:38 AM
 */




//echo $word[0]->id;

//echo $word;
?>
<table>
    <tr><th>单词</th><th>词频</th></tr>
    <?php foreach ($word as $one):  ?>
    <tr>
        <td><?php echo $one->word; ?></td><td><?php echo $one->frequent; ?></td>
    </tr>
    <?php endforeach; ?>
</table>