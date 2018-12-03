
<?php

$pages = ["SearchCategory","Timeline","ProfileEdit","NewContent","Mypage","Logout"];

foreach($pages as &$page){
    if($page <> $this->request->controller){
        echo "<a href ='$page'>" . $page . "</a>";
    }else{
        echo $page;
    }
}

?>
