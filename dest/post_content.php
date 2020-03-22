<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 頁籤標題 -->
    <title>毛孩交流區</title>
<link rel="icon" href="img/logo.ico" type="image/x-icon">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

    <!-- title: 本頁名稱 -->
    <link rel="stylesheet" href="./css/post_content.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <div class="postregionwrapper">
    <!-- 導覽列 -->
        <header class="header-navigation" id="header">
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
                <li><a href="./post_article_region.php">毛孩交流區</a></li>
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
</header>


        <div style="height:15vh"></div>
        <!-- header 的高度 -->

        <div>  <!-- 內文的高度 -->

            <div class="col-8 centerfix">
                <div class="breadcrumb">
                    <a href="#">貼文區or浪浪在哪裡</a>
                    <span>></span>
                    <a href="#">內文標題 or 寵物有善空間 : 店家-內文標題</a>
                </div>
            </div>

            <div class="col-8 centerfix">
                <div class="post3buttoncollection">
                    <div class="postfevoritebutton">
                        <div id='heart' class='heartbutton'></div>
                    </div>
                    <div class="postsharebutton">
                        <i class="fa fa-share-alt"></i>
                    </div>
                    <div class="postreportbutton">
                        <i class="fas fa-flag"></i>
                    </div>
                </div>
            </div>

            <div class="col-8 centerfix">
                <?php
                $piNo = $_REQUEST["piNo"];
                $errMsg = "";
                //連線資料庫
                try{
                  require './php/connectDB.php';
                  $sql = "select piTitle, piContent from postinfo where piNo = :piNo";
                  $products = $pdo->prepare($sql);
                  $products->bindValue(":piNo", $piNo);
                  $products->execute();
                }catch(PDOException $e){
                  $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
                  $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
                }
                ?>
                <?php
                if( $errMsg != ""){ //例外
                  echo "<div><center>$errMsg</center></div>";
                }elseif($products->rowCount()==0){
                      echo "<div><center>查無此商品資料</center></div>";
                }else{
                      $prodRow = $products->fetchObject();
                }
                ?>
                <h2 class="titleFont inlinefix"><?php echo $prodRow->piTitle;?></h2>  <!-- 原內容 : 內文標題 -->
                <div class="cpc_content">
                    <?php echo $prodRow->piContent;?>
                    <!-- <div class="cpc_content1">
                        <img class="cpc_contentpic1" src="https://media.istockphoto.com/photos/bad-cat-hates-people-picture-id609827900" alt="An Image" style="">
                        <p>圖片可以放在左邊</p>
                        <p>內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容。
                        </p>
                        <p>內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容。
                        </p>
                    </div>
                    <br><br>
                    <div class="cpc_content2">
                        <img class="cpc_contentpic2" src="https://www.catster.com/wp-content/uploads/2017/08/A-fluffy-cat-looking-funny-surprised-or-concerned.jpg" alt="An Image" style="">
                        <p class="cpc_contentfont2 firstline">文字可以置右擺放。</p>
                        <p class="cpc_contentfont2 secondline">圖片也可以放在右邊 + 文字置左。</p>
                        <p>內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容。
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容。
                        </p>
                    </div>
                    <br><br>
                        <img class="cpc_contentpic3" src="https://vcahospitals.com/-/media/vca/images/lifelearn-images/fatcatsidevieworange201801scaler.jpg?la=en&hash=CEE356351395E59DA13B9C69AA77D692" alt="An Image" style="">
                        <p>圖片也可以放在上面或下面。</p>
                        <p>內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                            內容內容內容內容內容內容內容內容內容內容。
                        </p>
                        <br><br>
                        <p>可以只有純文字。</p>
                        <p>內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                           內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                           內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                           內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容
                           內容內容內容內容內容內容內容內容內容內容。
                        </p> -->
                </div>
                <div class="postautherregion">
                    <img class="postautherimg" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf1BFE7_Gdnaou0lcz9NTHwZZaSIFd_jOXBcGIZsMnBxS1NdIX" class="memberhead" />
                    <div class="postauthercontent">
                        <p>作者姓名 : xxx</p>
                        <p>聯絡方式 : xxxxxxxxxxxxxxxxxxx 作者不想顯示就只有姓名這樣</p>
                    </div>
                </div>
                <hr class="cpchr">
                <div class="leftmessage">
                    <h2 class="titleFont inlinefix">留言區</h2>
                    <div class="postmessageregion">
                        <ul class="postmessenger">
                            <li class="leftedmessagecollect">前面還有 232 則留言</li>
                            <li class="leftedmessage">
                                <div class="docommonmessage">
                                    <div class="leftedmessageinfo">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf1BFE7_Gdnaou0lcz9NTHwZZaSIFd_jOXBcGIZsMnBxS1NdIX" class="memberhead" />
                                        <span class="membername">前人的姓名</span>
                                    </div>
                                    <div class="leftedmessagecontent">
                                        <p class="memberleftmessage">前人留下的留言</p>
                                        <p class="memberleftmessagetime">1天前</p>
                                    </div>
                                </div>
                                <div class="responsemember"><a href="#">檢舉</a><a href="#">回覆</a></div>
                            </li>
                            <li class="leftedmessage">
                                <div class="docommonmessage">
                                    <div class="leftedmessageinfo">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf1BFE7_Gdnaou0lcz9NTHwZZaSIFd_jOXBcGIZsMnBxS1NdIX" class="memberhead" />
                                        <span class="membername">前人的姓名</span>
                                    </div>
                                    <div class="leftedmessagecontent">
                                        <p class="memberleftmessage">前人的留言前人的留言前人的留言前人的留言前人的留言前人的留言前人的留言</p>
                                        <p class="memberleftmessagetime">13小時前</p>
                                    </div>
                                </div>
                                <div class="responsemember"><a href="#">檢舉</a><a href="#">回覆</a></div>
                            </li>
                            <li class="leftedmessage">
                                <div class="docommonmessage">
                                    <div class="leftedmessageinfo">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf1BFE7_Gdnaou0lcz9NTHwZZaSIFd_jOXBcGIZsMnBxS1NdIX" class="memberhead" />
                                        <span class="membername">前人的姓名</span>
                                    </div>
                                    <div class="leftedmessagecontent">
                                        <p class="memberleftmessage">前人留下的留言</p>
                                        <p class="memberleftmessagetime">1分鐘前</p>
                                    </div>
                                </div>
                                <div class="responsemember"><a href="#">檢舉</a><a href="#">回覆</a></div>
                            </li>
                            <li class="leftedmessage">
                                <div class="docommonmessage">
                                    <div class="leftedmessageinfo">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf1BFE7_Gdnaou0lcz9NTHwZZaSIFd_jOXBcGIZsMnBxS1NdIX" class="memberhead" />
                                        <span class="membername">前人的姓名</span>
                                    </div>
                                    <div class="leftedmessagecontent">
                                        <p class="memberleftmessage">前人的留言前人的留言前人的留言前人的留言前人的留言前人的留言前人的留言</p>
                                        <p class="memberleftmessagetime">2秒前</p>
                                    </div>
                                </div>
                                <div class="responsemember"><a href="#">檢舉</a><a href="#">回覆</a></div>
                            </li>
                            <!-- <li class="leaveamessage"> -->

                            <!-- </li> -->
                        </ul>
                        <div class="leaveamessage">
                            <label for="leaveamessage" class="labelleaveamessage">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSf1BFE7_Gdnaou0lcz9NTHwZZaSIFd_jOXBcGIZsMnBxS1NdIX" class="memberhead">
                                <input type="text" name="leaveamessage" placeholder="留言 ..." class="sendamessage"/>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer>
    <div class="page_top" id="page_top">
        <span class="titleFont smalltext">PAGE TOP</span>
    </div>
    <p class="titleFont smalltext">
        © 2020 Bring Love Home
    </p>
</footer>

<script src="./js/page_top.js"></script>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="./js/post_content.js"></script>
    <script src="./js/post_article_region.js"></script>
    <script src="./js/hamburger.js"></script>
    <script src="./js/header_slide.js"></script>
</body>
</html>
