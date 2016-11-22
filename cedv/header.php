<script type="text/javascript">
	function search_text_clicked(){
		var mark = document.getElementById("search_text");
		mark.setAttribute("value","");
	}
</script>

<div id="header">
  <div id='nav1' style="height:114px; width:400px; margin:0 auto 0 auto;"> <a href="index.php" ><img src="images/logo.png" style="margin-top:20px;" border="0"></a> </div>
  <ul>
    <li id="nav_index"> <a href="index.php">首页</a> </li>
    <li id="nav_overview"> <a href="overview.php">概览</a> </li>
    <li id="nav_list"> <a href="list.php">肿瘤列表</a> </li>
    <li id="nav_about"> <a href="about.php">关于</a> </li>
  </ul>
</div>
<div id="searchbar">
  <div>
    <form action="list.php" method="get">
      <table style="margin-left:auto; margin-right:auto;">
        <tr>
          <td><select name="searchOption" method="get" action="list.php" style="height:35px; font-size:20px;">
              <option value="0" style="alignment-adjust:middle;">&nbsp;综合搜索&nbsp; </option>
              <option value="1" style="alignment-adjust:middle;">&nbsp;ICD-O-3&nbsp;</option>
              <option value="2" style="alignment-adjust:middle;">&nbsp;中文名称&nbsp;</option>
              <option value="3" style="alignment-adjust:middle;">&nbsp;英文名称&nbsp;</option>
              <option value="4" style="alignment-adjust:middle;">&nbsp;MeSH&nbsp;</option>
              <option value="5" style="alignment-adjust:middle;">&nbsp;CMeSH&nbsp;</option>
              <option value="6" style="alignment-adjust:middle;">&nbsp;入口词&nbsp;</option>
              <option value="7" style="alignment-adjust:middle;">&nbsp;注释&nbsp;</option>
            </select></td>
          <td><input id="search_text" type="search" name="searchText" style="height:35px; font-size:20px; width:500px; text-indent:20px;" onclick="search_text_clicked()"/></td>
          <td><input type="submit" value=" 搜 索 " style="height:40px; font-size:20px;"/></td>
        </tr>
      </table>
    </form>
  </div>
</div>
