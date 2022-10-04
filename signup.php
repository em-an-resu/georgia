<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
  include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
  if(isset($_SESSION['myMemberSes'])){
    header("Location:./me.php");
    exit;
  }
 ?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta name="viewport" content="width=device-width" />
<meta charest="utf-8" />
<title>SignUp/Login Form</title>
<link rel="stylesheet" href="./css/cssReset.css" />
<link rel="stylesheet" href="./css/header.css" />
<link rel="stylesheet" href="./css/index.css" />
<link rel="stylesheet" href="./css/footer.css" />
<script type="text/javascript" src="./js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="./js/index.js"></script>
<script type="text/javascript" src="./js/valueCheck.js"></script>
</head>
<body>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/header.php';
  ?>
  <!--container-->
  <div id="container">
    <section id="introSite">
      <div id="siteComment">
        Sign-Up<br />
        Log-in<br />
        Form
      </div>
      <div id="signUpBtn">
        <p>Sign-Up</p>
      </div>
    </section>
    <section id="signup">
      <div id="signupCenter">
        <form id="signUpForm" method="post" action="./database/myMember.php">
          <div class="row">
            <div class="inputBox">
              <input type="text" name="userName" id="userName" placeholder="Name" />
            </div>
          </div>
          <div class="row">
            <div class="inputBox">
              <input type="email" name="userEmail" id="userEmail" placeholder="E-Mail" />
            </div>
          </div>
          <div class="row">
            <div class="inputBox">
              <input type="password" name="userPw" id="userPw" placeholder="PassWord" />
            </div>
          </div>
          <div class="row">
            <label>BirthDay</label>
            <div class="selectBox">
              <select name="birthYear" id="birthYear">
                <option value="">Year</option>
                <?php
                  //현재 연도를 구함
                  $nowYear = date('Y',time());
                  //현재 연도부터 1900년도까지 내림차순으로 option 태그 생성
                  for($i = $nowYear; $i >= 1900; $i--){?>
                <option value="<?$i?>"><?=$i?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class="selectBox selectBoxMargin">
              <select name="birthMonth" id="birthMonth">
                <option value="">Month</option>
                <?php
                  for($i = 1; $i <= 12; $i++){?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="selectBox">
              <select name="birthDay" id="birthDay">
                <option value="">Day</option>
                <?php
                  for($i = 1; $i <= 31; $i++){?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="row genderRow">
              <div id="genderLabel">
                <label for="gW" id="gMW">Woman</label>
                <label for="gM" id="gMM">Man</label>
              </div>
              <input type="radio" name="gender" class="gender" id="gW" value="w" />
              <input type="radio" name="gender" class="gender" id="gM" value="m" />
            </div>
            <div class="row">
              <p id="valueError"></p>
            </div>
            <div class="row">
              <div class="submitBox">
                <input type="submit" id="signUpSubmit" value="Sign-Up" />
              </div>
            </div>
            <input type="hidden" name="mode" value="save" />
          </form>
          <div id="goToLoginBtn">
            <p>Log-in</p>
          </div>
          </div>
        </section>
      </div>
      <?php
        include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/include/footer.php'
       ?>
</body>
</html>
