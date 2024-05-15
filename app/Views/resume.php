<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Resume</title>
</head>
<body>
    <div style="margin: 0 auto;display: block;width: 500px;">
     
        <?php 
             echo'<img src="'.base_url('assets/images/logo-rgph4.jpg').'" alt="PHOTO ..." class="img-flui" class="rounded" />';
             echo'<img src="C:/Users/HP/Desktop/INS/ins-recrut/public/assets/images/logo-rgph4.jpg" alt="PHOTO ..." class="img-flui" class="rounded" />';
        ?>

        

        <img src="<?= site_url().'/assets/images/logo-rgph4.jpg' ?>" /> 

        <table width="100%" border="1">
            <tr>
                <td colspan="2">
                    <img src="<?= $imageSrc ?>" style="width:200px;"> 
                </td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?= $name ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?= $address ?></td>
            </tr>
            <tr>
                <td>Mobile Number:</td>
                <td><?= $mobileNumber ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?= $email ?></td>
            </tr>
        </table>
    </div>
</body>
</html>