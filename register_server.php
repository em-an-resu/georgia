<?php

include('db.php');


if(isset($_POST['user_id']) && isset($_POST['user_nick']) && isset($_POST['user_pass1']) && isset($_POST['user_pass2'])){
    
    //보안을 더욱 강화
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_nick = mysqli_real_escape_string($db, $_POST['user_nick']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']);
    $user_pass2 = mysqli_real_escape_string($db, $_POST['user_pass2']);

    // if(isset($_POST['save'])){
    //     //보안을 더욱 강화
    //     function test_input($data){
    //         $sum = trim($data);
    //         $sum = stripslashes($data);
    //         $sum = htmlspecialchars($data);
    //         return $data;
    //     }
        
    //     $user_id = test_input($_POST['user_id']);
    //     $user_nick = test_input($_POST['user_nick']);
    //     $user_pass1 = test_input($_POST['user_pass1']);
    //     $user_pass2 = test_input($_POST['user_pass2']);

         //주소창 get
     $user_info = "user_id=".$user_id."&user_nick=".$user_nick;
     
    die();


    //에러를 체크
    if(empty($user_id)){
        header("location: register_view.php?error=아이디가 비어있어요.&$user_info");
    }
    else if(empty($user_nick)){
        header("location: register_view.php?error=닉네임이 비어있어요.&$user_info");
    }
    else if(empty($user_pass1)){
        header("location: register_view.php?error=비밀번호가 비어있어요.&$user_info");
        exit();
    }
    else if(empty($user_pass2)){
        header("location: register_view.php?error=비밀번호가 비어있어요.&$user_info");
        exit();
    }
    else if($user_pass1 !== $user_pass2){
            header("location: register_view.php?error=비밀번호가 일치하지 않아요.&$user_info");
            exit();
    }
    else{

        //암호화

        $user_pass1= password_hash($user_pass2, PASSWORD_DEFAULT);

        //아이디 또는 닉네임, 또는 아이디와 동시에 닉네임 중복체크
        $sql_same = "SELECT * FROM member where mb_id = '$user_id' and mb_nick = '$user_nick'";
        $order = mysqli_query($db, $sql_same);

        if(mysqli_num_rows($order) > 0){
            header("location: register_view.php?error=아이디 또는 닉네임이 이미 있어요.&$user_info");
            exit();
        }
        else{
            $sql_save = "insert into member(mb_id, mb_nick, password) values('$user_id', '$user_nick', '$user_pass1')";
            $result = mysqli_query($db, $sql_save);

            if($result){
                header("location: register_view.php?success=성공적으로 가입 되었습니다.");
                exit();
            }
            else{
                header("location: register_view.php?error=가입에 실패하였습니다.&$user_info");
                exit();
            }

        }


    }


}
else{
    header("location: register_view.php?error=알 수 없는 오류가 발생하였습니다.");
    exit();
}







?>