<html>
<head>
<title> UGV Edu</title>

<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
}
.navbar{
  background: #0082e6;
  height: 55px;
  width: 100%;
}
#logo{
  float: left;
  color: orange;
  font-weight: 600;
  font-size: 22px;
  padding: 0 25px;
  line-height: 55px;
  font-family: 'Poppins', sans-serif;
}
nav ul{
  float: right;
  margin-right: 60px;
  line-height: 55px;
}
nav ul #active{
  background: crimson;
}
nav ul li{
  display: inline-block;
  margin: 0 7px;
}
nav ul li a{
  color: #f2f2f2;
  font-weight: 450;
  font-size: 18px;
  padding: 0 5px;

  text-transform: uppercase;
  font-family: 'Poppins', sans-serif;
}

.home{
    display: flex;
    background: url("bg.jpg") no-repeat center;
    height: 78vh;
    color: #fff;
    min-height: 480px;
    background-size: cover;
    background-attachment: fixed;
    font-family: 'Ubuntu', sans-serif;
}
.home .max-width{
    margin: auto 0 auto 30px;
}
.home .home-content .text-1{
    font-size: 36px;
    color: orange;
    font-weight: 700;
    padding: 10px;


}

.home .home-content a{
    display: inline-block;
    background: crimson;
    color: #fff;
    font-size: 20px;
    padding: 12px 36px;
    margin-top: 20px;
    font-weight: 400;
    border-radius: 6px;
    border: 2px solid crimson;
    transition: all 0.3s ease;
}
.home .home-content a:hover{
    color: crimson;
    background: none;
}

footer{
    background: #111;
    padding: 15px 23px;
    color: #fff;
    text-align: center;
}
footer .social{
  margin: 7px;
  font-size: 18px;
  text-align: center;
  font-family: sans-serif;

}

footer span a{
    color: crimson;
    text-decoration: none;
}
footer span a:hover{
    text-decoration: underline;
}


</style>
  </head>
  <body>
    <nav class="navbar">
      <a href="/" id="logo">UGV</a>
      <ul>
        <li id="active"><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/departments">Departments</a></li>
        <li><a href="/gallery">Gallery</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/login">Login</a></li>
        
        
      </ul>
    </nav>
     <section class="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">University Of Global Village</div>
                <a href="#">Admission</a>
            </div>
        </div>
    </section>


        <footer>
          <div class="social">
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">github</a>
          </div>
          
        <span>Created By <a href="#">SaidulNayan</a> | 2021 All rights reserved.</span>
    </footer>

</body>
</html>