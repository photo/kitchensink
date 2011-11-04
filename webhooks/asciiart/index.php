<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="english,en" />
  <meta name="distribution" content="global" />
    <title>OpenPhoto</title>
    <meta name="description" content="OpenPhoto - A free, hosted, portable and open source photo sharing service">
    <meta name="keywords" content="OpenPhoto, photos, photo">
    <meta name="author" content="openphoto.me">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      body{
        font: 1em 'Lucida Grande','Lucida Sans Unicode',Geneva,Verdana,Sans-Serif;
      }
      #wrapper {
        width:400px;
        margin:auto;
        margin-top:100px;
      }
      #logo {
        background:url("/logo.png") no-repeat;
        width:234px;
        height:43px;
        margin:auto;
      }
      h1{
        font-size:2em;
        text-align:center;
      }
      input{
        border:none;
        border:solid 1px #ddd;
        -moz-border-radius: 15px;
        -webkit-border-radius: 15px;
        border-radius: 15px;
        padding:5px;
        margin:0 0 15px;
        font-size:1.5em;
        width:100%;
      }
      p{
        font-style:italic;
        color:#bbb;
        font-size:.60em;
        text-align:center;
      }
      ::-webkit-input-placeholder {
         color: #aaa;
      }

      :-moz-placeholder {
         color: #aaa;
      }
      .button {
         border-top: 1px solid #96d1f8;
         background: #65a9d7;
         background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
         background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
         background: -moz-linear-gradient(top, #3e779d, #65a9d7);
         background: -ms-linear-gradient(top, #3e779d, #65a9d7);
         background: -o-linear-gradient(top, #3e779d, #65a9d7);
         padding: 14px 28px;
         -webkit-border-radius: 15px;
         -moz-border-radius: 15px;
         border-radius: 15px;
         -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
         -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
         box-shadow: rgba(0,0,0,1) 0 1px 0;
         text-shadow: rgba(0,0,0,.4) 0 1px 0;
         color: white;
         font-size: 21px;
         text-decoration: none;
         vertical-align: middle;
         display:block;
         width:140px;
         text-align:center;
         margin:auto;
         }
      .button:hover {
         border-top-color: #3e779d;
         background: #3e779d;
         color: #ccc;
         cursor:pointer;
         }
      .button:active {
         border-top-color: #3e779d;
         background: #3e779d;
         }
    </style>
    <script type="text/javascript">
      function goToSite() {
        var hostname = document.getElementById('hostname').value,
            email = document.getElementById('email').value;
        if(hostname.length > 0 && email.length > 0)
          location.href = 'http://'+hostname+'/v1/oauth/authorize?name='+escape('OpenPhoto ASCII Art')+'&oauth_callback='+escape(location.href+'oauth.php?email='+email);
      }
    </script>
</head>
<body>
  <div id="wrapper">
    <div id="logo"></div>
    <div class="form">
      <h1>Get your photos emailed as ASCII art!</h1>
      <p>
      To start, you'll need an <a href="http://signup.openphoto.me">OpenPhoto site</a>.
      </p>
      <form onsubmit="return false;">
        <input type="text" id="hostname" placeholder="Your OpenPhoto host name">
        <input type="text" id="email" placeholder="Your email address">
        <a class="button" onclick="goToSite();">Authorize &gt;&gt;</a>
      </form>
    </div>
  </div>
</body>
</html>

