<?php
require 'openid.php';
try {
    $openid = new LightOpenID('localhost');
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'https://www.google.com/accounts/o8/id';
             $openid->required = array('namePerson/first', 'namePerson/last', 'contact/email');
            header('Location: ' . $openid->authUrl());

        }
?>

<!DOCTYPE HTML>  
<html>  
<head>  
    <title>App</title>  
    <link href="css/bootstrap.min.css" rel="stylesheet">  
     <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
</head>  

  <body>
    <div class="container">
 <form method="POST" action="?login" class="form-signin">  
        <button class="btn btn-large btn-primary" type="submit">Sign in with google account!</button>
    </form>     
    </div> 
</body>  
</html>  

<?php
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
         $d = $openid->getAttributes(); 
         $email = $d['contact/email'];
         $nameF = $d['namePerson/first'];
         $nameL = $d['namePerson/last'];
         header('Location: /~ayeshaahmad/main.php?p1=' . $email . '&p2=' . $nameF . '&p3=' . $nameL . '');

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
