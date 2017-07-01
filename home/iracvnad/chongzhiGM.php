<!doctype html>
<?php
include "top.php"
?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
 function Pay()
 {
  $.ajaxSetup({
  contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./GM/pay.php", {acc:$("#userid").val(),playerID:$("#userid").val(),type:$("#gn").val()},function(data)
  {
    $("#divMsg").html(data);
  }
  );
 } 
 function gold()
 {
  $.ajaxSetup({
  contentType: "application/x-www-form-urlencoded; charset=utf-8"
  });
  $.post("./GM/pay2.php", {acc:$("#userid").val(),playerID:$("#userid").val(),type2:$("#gn2").val()},function(data)
  {
    $("#divMsg").html(data);
  }
  );
 }
</script>
<div class="container clearfix">
    <?php 
	 include "menu.php"
	?>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">Trang chủ</a><span class="crumb-step">&gt;</span><span class="crumb-name">Thêm Kim Cương</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                    <table class="search-tab">
                            <tr><td>Tên tài khoản: <input class="common-text" value="<?php echo $_GET['userid'];?>" name="userid"  id="userid" type="text" disabled></td></tr>
                            <tr><td>Tên nhân vật: <input class="common-text" value="<?php echo $_GET['name'];?>" name="name"  id="name"  type="text" disabled></td></tr>
                            <tr><td>Số Kim Cương thêm:
                              <select name="gn" id="gn" >
                              <option value='1000'>1000 Kim Cương</option>
                              <option value='3000'>3000 Kim Cương</option>
                              <option value='5000'>5000 Kim Cương</option>
                              <option value='10000'>10000 Kim Cương</option>
                              <option value='50000'>50000 Kim Cương</option>
                              <option value='1000000'>1000000 Kim Cương</option>
                              </select>
                            </td></tr>
                            
                            <td><input class="btn btn-primary btn2" id="sub" value="Thêm Kim Cương" type="button" onclick="Pay()"></td>
                            </tr>   
                    </table>
					<br>
                    <table class="search-tab">
                            <tr><td>Tên tài khoản: <input class="common-text" value="<?php echo $_GET['userid'];?>" name="userid"  id="userid" type="text" disabled></td></tr>
                            <tr><td>Tên nhân vật: <input class="common-text" value="<?php echo str_replace("","QMQJ",$_GET['name']);?>" name="name"  id="name"  type="text" disabled></td></tr>
                            <tr><td>Số Gold thêm:
                              <input class="common-text" value="" name="gn2"  id="gn2"  type="text">
                            </td></tr>
                            
                            <td><input class="btn btn-primary btn2" id="sub" value="Thêm Gold" type="button" onclick="gold()"></td>
                            </tr>   
                    </table>
               <div  id="divMsg"> </div>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>