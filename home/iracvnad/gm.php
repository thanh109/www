<!doctype html>
<?php
   include "top.php";
   ?>
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" >
   function mail()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/email.php", {yinliang:$("#yinliang").val(),yuanbao:$("#yuanbao").val(),receiverrid:$("#receiverrid").val(),attachgoods:$("#attachgoods").val(),gcount:$("#gcount").val(),binding:$("#binding").val(),level:$("#level").val(),lucky:$("#lucky").val(),append:$("#append").val(),exinfo:$("#exinfo").val()},function(data)
    {
     alert(data);
    }
    );
   }
   
    function note()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {note:$("#note").val(),act:'1'},function(data)
    {
     alert(data);
    }
    );
   }
   
     function hongbao()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {hongbao:$("#hongbao").val(),hbnum:$("#hbnum").val(),act:'2'},function(data)
    {
     alert(data);
    }
    );
   }
   
   function ti()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    if(document.getElementById("checkbox2").checked){
      $("#checkbox2").val("1");
   }else{
    $("#checkbox2").val("0");
   }
    $.post("./GM/action.php", {playerID:$("#playerID").val(),tiall:$("#checkbox2").val(),act:'3'},function(data)
    {
     alert(data);
    }
    );
   }
   
   function rename()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {rename:$("#rename").val(),playerID:$("#playerID").val(),act:'4'},function(data)
    {
     alert(data);
    }
    );
   }
   
   function gnvalue()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {gn:$("#gn").val(),playerID:$("#playerID").val(),gnvalue:$("#gnvalue").val(),act:'5'},function(data)
    {
     alert(data);
    }
    );
   }
   
   function jyan()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {playerID:$("#playerID").val(),act:'6'},function(data)
    {
     alert(data);
    }
    );
   }
   
   function unjyan()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {playerID:$("#playerID").val(),act:'7'},function(data)
    {
     alert(data);
    }
    );
   }
   
   function fhao()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {playerID:$("#playerID").val(),act:'8'},function(data)
    {
     alert(data);
    }
    );
   }
   
   function unfhao()
   {
    $.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
    });
    $.post("./GM/action.php", {playerID:$("#playerID").val(),act:'9'},function(data)
    {
     alert(data);
    }
    );
   }
   
</script>
<div class="container clearfix">
   <?php
      include "menu.php";
      ?>
   <!--/sidebar-->
   <div class="main-wrap">
      <div class="crumb-wrap">
         <div class="crumb-list"><i class="icon-font"></i><a href="index.php">Trang chủ</a><span class="crumb-step">&gt;</span><span class="crumb-name">Chức năng</span></div>
      </div>
      <div class="search-wrap">
         <div class="search-content">
            <table class="search-tab">
               <tr>
                  <td>
                     Nhân vật: <input class="common-text" value="<?php
                        echo $_GET['name'];
                        ?>" name="name"  id="name"  type="text" disabled>
                     ID: <input class="common-text" value="<?php
                        echo $_GET['id'];
                        ?>" name="receiverrid"  id="receiverrid"  type="text" disabled>
                  </td>
               </tr>
               <!--邮件-->
               <tr>
                  <td>
                     <hr>
               <tr>
                  <td>Vàng: <input class="common-text" value="0" name="yinliang"  id="yinliang"  type="text" size="7"></td>
               </tr>
               <tr>
                  <td>Kim Cương: <input class="common-text" value="0" name="yuanbao"  id="yuanbao"  type="text" size="7"></td>
               </tr>
               <tr>
                  <td>Item ID: <input class="common-text" value="" name="attachgoods"  id="attachgoods"  type="text" size="7"></td>
               </tr>
               <tr>
                  <td>Số lượng: <input class="common-text" value="1" name="gcount"  id="gcount"  type="text" size="7"></td>
               </tr>
               <tr>
                  <td>Exinfo: <input class="common-text" value="235" name="exinfo"  id="exinfo"  type="text" size="7"></td>
               </tr>
               <tr>
                  <td>
                     <select name="binding" id="binding"  value="1">
                        <option value="1">Khóa</option>
                        <option value="0">Không Khóa</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>
                     <select name="lucky" id="lucky"  value="0">
                        <option value="0">Không có 5%</option>
                        <option value="1">Có 5%</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>
                     Level : <input class="common-text" name="level" id="level" value="15" type="text" size="7" >
                        
                  </td>
               </tr>
               <tr>
                  <td>
                     Append : <input class="common-text" name="append" id="append" value="80" type="text" size="7" >
                     
                  </td>
               </tr>
               <tr>
                  <td><span><input class="btn btn-primary btn2" id="sub" value="Thực hiện" type="button" onclick="mail()"></span></td>
               </tr>
               <!--公告-->
               <tr>
                  <td>
                     <hr>
                     Hệ thống thông báo<br>
               <tr>
                  <td> Nội dung: <input class="common-text" value="Thông báo Mu Vô Song" name="note"  id="note"  type="text" size="100"></td>
               </tr>
               <tr>
                  <td><span><input class="btn btn-primary btn2" id="sub" value="Thực hiện" type="button" onclick="note()"></span></td>
               </tr>
               <!--全服发红包-->
               <tr>
                  <td>
                     <hr>
                     Đổi tên nhân vật<br>
               <tr>
                  <td> Tên nhân vật: <?php
                     echo $_GET['name'];
                     ?>
                     đổi thành: <input class="common-text" value="" name="rename"  id="rename"  type="text" size="16">
                  </td>
               </tr>
               <tr>
                  <td><span><input class="btn btn-primary btn2" id="sub" value="Thực hiện" type="button" onclick="rename()"></span></td>
               </tr>
               <!--改属性-->
               <tr>
                  <td>
                     <hr>
                     Thay đổi thuộc tính<br>
               <tr>
                  <td>
                     Tên nhân vật: <?php
                        echo $_GET['name'];
                        ?>
                     <select name="gn" id="gn" >
                        <option value=''>Chọn loại thay đổi</option>
                        <option value='mabang'>Ma Băng</option>
                        <option value='level'>Cấp độ</option>
                        <option value='gold'>Kim Cương</option>
                        <option value='coin'>Vàng</option>
                     </select>
                     đổi thành: <input class="common-text" value="" name="gnvalue"  id="gnvalue"  type="text" size="16">
                  </td>
               </tr>
               <tr>
                  <td><span><input class="btn btn-primary btn2" id="sub" value="Thực hiện" type="button" onclick="gnvalue()"></span></td>
               </tr>
               <!--禁言封号-->                       
            </table>
            <div  id="divMsg"> </div>
         </div>
      </div>
   </div>
   <!--/main-->
</div>
</body>
</html>