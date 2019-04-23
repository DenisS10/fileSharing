<!--<div>-->
<!--    <table class="table table-bordered">-->
<!--        <thead>-->
<!---->
<!--        </thead>-->
<?//
//echo '<pre>';
//print_r($imgArr);
//$name = '/1/e1e7077e05f1066d28d4c9a9f5d86bbed.png';
//?>
<!--        <tbody>-->
<!--        <tr>-->
<!--            <td><img src="/application/file_dump--><?//$name?><!--" </td>-->
<!--            <td></td>-->
<!--        </tr>-->
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->
<div>
    <form enctype="multipart/form-data" class="" method="post" action="">
        <input type="file" name="userFile">
        <button class="" >Send</button>
    </form>

<div>
    <form class="" method="post" action="">
        <label>Enter link</label>
        <input  name="file_key">

<!--        <img src="">-->
        <button class="" type="submit" >Get file!</button>
    </form>
</div>
</div>

<div>
    <ul style="list-style-type: none;">
    <? foreach ($imgArr as $img) {
//        echo '<pre>';
//       print_r($img);


        ?>
<li>
    <a href="download/<?=$img->file_key?>"><?if($img->extension == 'jpg' || $img->extension == 'png' || $img->extension == 'gif' || $img->extension == 'JPG'|| $img->extension == 'PNG'|| $img->extension == 'GIF'){?><img src="<?=$img->file_link?>"><?}else echo 'Download file';?></a><!-- style="width:82px; height:86px"-->
</li>
    <?}?>
</ul>
</div>