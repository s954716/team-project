let member;
//member.memNo --- 登入會員編號
//member.memId --- 登入會員帳號
//member.memName --- 登入會員暱稱
//member.memPsw --- 登入會員密碼
//member.memPic --- 登入會員圖片
//member.memPoint --- 登入會員紅利點數
//member.memStatus --- 登入會員狀態
//member.memTagNo --- 登入會員解鎖吊牌編號



//會員判斷
function getMember(){
    var xhr= new XMLHttpRequest();
    var url= "./php/checkMem.php";
    xhr.open("GET",url,true);
    xhr.send(null);
    
    xhr.onload=function (){
        if( xhr.status == 200 ){
            member= JSON.parse(xhr.responseText);
            if(member.memId){
                var header = document.getElementById("header");
                header.innerHTML=`
                <nav class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12 container">
                        <h1>
                            <a href="./index.html">
                                <img src="./img/logo-wide.png" alt="logo">
                            </a>
                        </h1>
                        <ul class="col-xl-9 col-lg-9 col-md-9">
                            <li><a href="./map.html">浪浪在哪裡</a></li>
                            <li><a href="./donation.html">愛心助浪浪</a></li>
                            <li><a href="./customized.html">客製化項圈</a></li>
                            <li><a href="./post_article_region.html">毛孩交流區</a></li>
                            <li><a href="./aboutus.html">關於我們</a></li>
                            <li class="rwd"><a href="./memberCenter.html">會員中心</a></li>
                            <li class="rwd"><a href="./message.html">我的信箱</a></li>
                            <li class="rwd"><a href="./index.html">登出</a></li>
                            <li class="memZone">
                                <div>
                                    <div class="memPic"></div>
                                    <div class="message">
                                        <span id="headerUnread" class="unread"></span>
                                    </div>
                                </div>
                                <ul class="memZone">
                                    <li><a href="./memberCenter.html">會員中心</a></li>
                                    <li><a id="signOut" onclick="signOut()">登出</a></li>
                                </ul>
                            </li>
                        </ul>
                        <button class="hamburger hamburger--spring" type="button">
                            <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </nav>
                `;
                //漢堡選單
                $("button.hamburger").on("click", function(){
                    $(this).toggleClass("is-active");
                    $("nav ul").slideToggle();
                });
                var script= document.getElementById("script");
                var body= document.querySelector('body');
                var headerScript= document.createElement("script");
                headerScript.src="./js/memberHeader.js";
                body.insertBefore(headerScript,script);
                var memImgSrc= member.memPic;
                var memImg= document.querySelector('li.memZone div div.memPic');
                memImg.style.backgroundImage=`url("./img/memImg/${memImgSrc}")`;


                var headerUnread= document.getElementById("headerUnread");
                var xhr2= new XMLHttpRequest();
                var url2= "./php/headerUnread.php";
                xhr2.open("POST",url2,true);
                xhr2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                var data_info2= `memNo=${member.memNo}`;
                xhr2.send(data_info2);
                
                xhr2.onload=function(){
                    if(xhr2.status==200){
                        if(xhr2.responseText!=0){
                            headerUnread.style.display="inline-block";
                            headerUnread.innerText= xhr2.responseText;
                        }else{
                            headerUnread.style.display="none";
                        }
                    }else{
                        alert(xhr2.status);
                    }
                }
            }
        }else{
            alert(xhr.status);
        }
    }
}
getMember();

//會員登出
function signOut(){
    var xhr= new XMLHttpRequest();
    var url= "./php/signOut.php";
    xhr.open("GET",url,true);
    xhr.send(null);

    xhr.onload=function (){
        if(xhr.status==200){
            var header = document.getElementById("header");
                header.innerHTML=`
                <nav class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="container col-xl-8 col-lg-9 col-md-11 col-sm-12">
                        <h1>
                            <a href="./index.html">
                                <img src="./img/logo-wide.png" alt="logo">
                            </a>
                        </h1>
                        <ul class="col-xl-9 col-lg-9 col-md-9">
                            <li><a href="./map.html">浪浪在哪裡</a></li>
                            <li><a href="./donation.html">愛心助浪浪</a></li>
                            <li><a href="./customized.html">客製化項圈</a></li>
                            <li><a href="./post_article_region.html">毛孩交流區</a></li>
                            <li><a href="./aboutus.html">關於我們</a></li>
                            <li><a class="login" href="./login.html">登入 / 註冊</a></li>
                        </ul>
                        <button class="hamburger hamburger--spring" type="button">
                            <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </nav>
                `;
                sessionStorage.clear();
                
                if(location.pathname.split("/").pop()=="message.html"||location.pathname.split("/").pop()=="memberCenter.html"){
                    location.href="./index.html";
                }
                
        }else{
            alert( xhr.status );
        }
    }
}