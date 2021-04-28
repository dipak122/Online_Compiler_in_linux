<html>

<head></head>
<?php $mm='hello' ?>
<body>
    <form action="sample1.php" method="POST">
        <input type="hidden" name="inputdata" id="" value="<?php echo $mm ?>" >
        <!-- <textarea name="inputdata" id="" cols="30" rows="10" value="<?php echo $mm ?>"></textarea> -->
        <input type="submit" value="Submit">
    </form>
</body>

</html>