
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Happy Farm</title>
<style type="text/css">

#frame {
    position: absolute; 
    width: 960px; 
    top: 50%;
    left: 50%;
    margin: -270px 0 0 -480px;
}
#frame img { 
    max-width:100%; 
    width:expression(document.body.clientWidth>document.getElementById("frame").scrollWidth*8/10? "100%": "auto" );
    heitht:auto;
}
#clogin{
    position: absolute;
    top:180px;
    left: 300px;
}
#csign{
    position: absolute;
    top:320px;
    left: 300px;
}
</style>

</head>
<body>
<div id="frame">
<img id="farm1" src="img\farm1.gif" />
<a href="login.html"><img id="clogin" src="img\clogin.png"></a>
<a href="signup.html"><img id="csign" src="img\csign.png"></a>
</div>
</body>
</html>