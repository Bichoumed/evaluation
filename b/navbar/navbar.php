<!DOCTYPE html>
<html>
<head>
<meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="navbar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <style>
    *{ 

    font-family: 'Cabin', Tahoma, Geneva, Verdana, sans-serif;
}
  

.nav-container{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 1300px;
    background: linear-gradient(320deg, #1a1f25 65%, #20262e 65%);
    border: 4px solid #30475E;
    padding: 20px;
    margin: 35px auto;
    border-radius: 5px;
    
}

.nav-link{
    color: #fff;
    text-align: center;
    padding-bottom: 20px;
    text-decoration: none;
    width: 120px;
    font-size: 18px;
    color: #ffffff;
    z-index: 1;
    transition: .3s opacity;
}

.nav-link:hover .link-numbers{
    color: #fff !important;
}

.nav-link-settings{
    display: flex !important;
    opacity: 1 !important;
    transform: scale(1) !important;
}



.nav-links-effect-container{
    position: relative;
    display: flex;
    align-items: center;
}

.dot-link-effect{
    position: absolute;
    left: 10%;
    bottom: 0px;
    height: 8px;
    width: 8px;
    border-radius: 50%;
    box-shadow: 0 0 10px #fff;
    background: #fff;
    transition: .8s cubic-bezier(0.18, 0.89, 0.34, 1.10) all;
    z-index: 0;
    animation: dot-eff ease 5s 1s infinite;
}







/* text-opactity */

#nth a:nth-child(n):hover ~ .dot-link-effect{
    transform: scale(1.20);
    box-shadow: 0 0 20px #fff;
}

#nth a:nth-child(1):hover ~ .dot-link-effect{
    left: 10%;
}

#nth a:nth-child(2):hover~.dot-link-effect {
    left: 30%;
}

#nth a:nth-child(3):hover~.dot-link-effect {
    left: 50%;
}

#nth a:nth-child(4):hover~.dot-link-effect {
    left: 70%;
}

#nth a:nth-child(5):hover~.dot-link-effect {
    left: 90%;
}


.link-numbers{
    font-size: 15px;
    font-family: consolas;
    text-align: right;
    color: #fff;
    opacity: .50;
    transition: .3s;
}



.nav-title{
    display: flex;
    align-items: center;
    color: #fff;
    font-size: 24px;
}



.profile-img img{
    height: 70px;
    width: 70px;
    left:2px;
    border-radius: 50%;
}

.type-bar, .job-bar{
    position: relative;
    font-size: 18px;
    margin-right:3px;
}
.typewriting {
    display: flex;
    align-items: center;
    margin:5px 0 0;
}


</style>
</head>
      <nav>
    
        <div class="nav-container">
            <div class="nav-title">
                <div class="profile-img">
                    <img src="logo.jpeg" alt="profile">
                </div>
                <div class="name-align">
                    <div class="name-bar"><i>FeedBack</i></div>
                    <div class="typewriting">
                        <div class="type-bar"> SupNum :</div>
                        <div class="job-bar"></div>
                    </div>
                </div>
            </div>

            <div class="nav-link-container">
                <div class="nav-links nav-link-settings">
                    <div id="nth" class="nav-links-effect-container">
                        
                        <a href="../Accueil/index.php" class="nav-link" href="#">                           
                            <div class="link-anim-set">
                                <div class="link-anim-set-p p1">
                                    <div class="link-numbers">01</div><span class="slash"></span>Accueil
                                </div>
                            </div>
                        </a>
                        <a href="../matiere1/index.php" class="nav-link" href="#">
                        <div class="link-anim-set">
                            <div class="link-anim-set-p p2">
                                <div class="link-numbers">02</div><span class="slash"></span>Matières
                            </div>
                        </div>
                        </a>
                        <a href="../student/index.php" class="nav-link" href="#">
                        <div class="link-anim-set">
                            <div class="link-anim-set-p p3">
                                <div class="link-numbers">03</div><span class="slash"></span>Etudiants
                            </div>
                        </div>
                        </a>
                        <a href="../axe/index.php" class="nav-link" href="#">
                            <div class="link-anim-set">
                                <div class="link-anim-set-p p4">
                                    <div class="link-numbers">04</div><span class="slash"></span>Axes
                                </div>
                            </div>
                        </a>
                        <a href="../question/index.php" class="nav-link" href="#">
                            <div class="link-anim-set">
                                <div class="link-anim-set-p p5">
                                    <div class="link-numbers">05</div><span class="slash"></span>Questions
                                </div>
                            </div>
                        </a>

                        <div class="dot-link-effect"></div>
</nav>
                  

<script>
const texts = ["   L'institut superieur du Numerique  "];
var count = 0;
var index = 0;
var decrement = 0;
var currentText = '';
var letter = '';

function sleep(delay) {
    return new Promise(resolve => setTimeout(resolve, delay));
}

const typeWrite = async () => {
    if (count == texts.length) {
        count = 0;
    }
    currentWord = texts[count];
    currentLetter = currentWord.slice(0, ++index);
    document.querySelector(".job-bar").textContent = currentLetter;
    if (index == currentWord.length) {
        await sleep(1500);
        while (index > 0) {
            currentLetter = currentWord.slice(0, --index);
            document.querySelector(".job-bar").textContent = currentLetter;
            await sleep(50);
        }
        count++;
        index = 0;
        await sleep(500);
    }
    setTimeout(typeWrite, Math.random() * 200 + 50);
}
typeWrite(); 
    
</script>