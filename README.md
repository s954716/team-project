# DEMO
http://140.115.236.71/demo-projects/DD105/DD105G1/


## 團體專案負責部分


### 編寫共用的HTML結構
* 將header、footer共用區塊獨立來寫，並透過gulp的fileinclude任務去include

### 用sass做共用元件(sass/layout)編寫
* 將公用的一些樣式，如按鈕、字型、格線、header、footer、RWD，寫成組件

### 「關於我們」頁面切版及功能
* 使用flex排版以及頁面RWD
* 活動新聞宣導裡面內容以vue.js、axios連結php，將資料庫資料傳回渲染在HTML上

### 會員登入頁面的忘記密碼功能 (忘記密碼所輸入的帳號:dd105g1green@gmail.com )
* 使用PHPMAILER並且撰寫隨機產生一組新密碼的function，修改資料庫現有密碼並將新密碼寄到收件人信箱

### 後台版型切版
* 使用bootstrap進行切版

### 後台登入頁面(帳號:dd105 密碼:green0000)
* 用jQuery去控制，點擊輸入帳號密碼的input時，出現清除內容的圖標，移開後則消失
* 使用 $.ajax 連結PHP，判斷輸入的帳號密碼是否與資料庫一樣
* 登入成功時，使用HTML5的sessionStorage將回傳資料儲存，並取出現在登入者姓名的VALUE值顯示在後台右上角

### 後台 管理員管理
* 使用 $.ajax 連結PHP，將資料庫資料回傳後，用ES6模板字串 將資料渲染出來

### 後台 活動新聞宣導 管理
* 使用vue.js、axios連結php，將資料從後端帶回頁面上，並且可以對資料進行新增、修改、刪除








