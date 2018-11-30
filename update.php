<?php
  function print_title(){
    if(isset($_GET['id'])){
      echo $_GET['id'];
    }else{
      echo 'welcome';
    }
  }

  function print_list(){
    $list = scandir('./data');
    $i = 0;

    while($i < count($list)){
      if($list[$i] != '.'){
        if($list[$i] != '..'){
          echo "<li><a href='index.php?id=$list[$i]'>$list[$i]</a></li>";
        }
      }
      $i++;
    }
  }

  function print_description(){
    if(isset($_GET['id'])){
      echo file_get_contents('data/'.$_GET['id']);
    }else{
      echo 'HEllo,PHP';
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> print_title(); </title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <?php
      //data 디렉토리에 있는 파일의 목록을 가져오세요.PHP님
      //파일의 목록 하나하나를  li와 a태그를 이용해서 글 목록을 만드세요
      print_list();
    ?>
    <br>
    <button type="button"><a href="create.php">글 쓰기</a></button>
    <?php if(isset($_GET['id'])){ ?>
      <button type="button"><a href="update.php?id=<?=$_GET['id']?>">글 수정</a></button>;
    <?php } ?>


    <form action="update_process.php" method="post">
      <input type="hidden" name="old_title" value="<?=$_GET['id'] ?>">
      <p>
        <input type="text" name="title" value="<?php print_title(); ?>">
        <input type="submit">
      </p>
      <p>
        <textarea name="description"><?php print_description(); ?></textarea>
      </p>
    </form>

  </body>
</html>
