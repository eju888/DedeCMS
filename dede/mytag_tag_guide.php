<?
require_once(dirname(__FILE__)."/config.php");
require_once(dirname(__FILE__)."/../include/inc_typelink.php");
?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=gb2312'>
<title>���ܱ����</title>
<link href='base.css' rel='stylesheet' type='text/css'>
<script language="JavaScript">
function ChangeListStyle(){
   var itxt = document.getElementById("myinnertext");
   var myems = document.getElementsByName("liststyle");
   if(myems[0].checked) itxt.value = document.getElementById("list1").innerHTML;
   else if(myems[1].checked) itxt.value = document.getElementById("list2").innerHTML;
   else if(myems[2].checked) itxt.value = document.getElementById("list3").innerHTML;
   else if(myems[3].checked) itxt.value = document.getElementById("list4").innerHTML;
   itxt.value = itxt.value.replace("<BR>","<BR/>");
   itxt.value = itxt.value.toLowerCase();
}
function DoSubmit(j){
	document.form1.dopost.value = j;
	document.form1.submit();
}
</script>
</head>
<body background='img/allbg.gif' leftmargin='8' topmargin='8'>
<center>
<span style="display:none" id="list1">
��[field:textlink/]([field:pubdate function=strftime('%m-%d',@me)/])<br/>
</span>
<span style="display:none" id="list2">
��[field:typelink/] [field:textlink/]<br/>
</span>
<span style="display:none" id="list3">
<table width='98%' border='0' cellspacing='2' cellpadding='0'>
   <tr><td align='center'>[field:imglink/]</td></tr>
   <tr><td align='center'>[field:textlink/]</td></tr>
</table>
</span>
<span style="display:none" id="list4">
<table width='100%' border='0' cellspacing='2' cellpadding='2'>
  <tr> 
    <td width='30%' rowspan='2' align='center'>[field:imglink/]</td>
    <td width='70%'><a href='[field:filename/]'>[field:title/]</a></td>
  </tr>
  <tr><td>[field:info/]</td></tr>
</table>
</span>
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#666666" align="center">
  <form action="mytag_tag_guide_ok.php" method="post" target="stafrm" name="form1">
  <input type="hidden" name="dopost" value="gettag"/>
  <tr> 
    <td height="23" background="img/tbg.gif"><b><a href="mytag_main.php"><u>�Զ����ǹ���</u></a></b> &gt;&gt; ���ܱ�������򵼣�</td>
  </tr>
  <tr> 
    <td height="265" valign="top" bgcolor="#FFFFFF"><table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr> 
            <td height="28">�б���ʽ��</td>
          </tr>
          <tr> 
            <td height="72"><table width="99%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="25%" height="126"><img src="img/g_t2.gif" width="130" height="100"> 
                    <input name="liststyle" class="np" type="radio" onclick="ChangeListStyle()" value="1" checked> 
                  </td>
                  <td width="25%"><img src="img/g_t1.gif" width="130" height="110"> 
                    <input type="radio" class="np" onclick="ChangeListStyle()" name="liststyle" value="2"></td>
                  <td width="25%"><img src="img/g_t3.gif" width="130" height="110"> 
                    <input type="radio" class="np" onclick="ChangeListStyle()" name="liststyle" value="3"></td>
                  <td><img src="img/g_t4.gif" width="130" height="110"> <input type="radio" class="np" onclick="ChangeListStyle()" name="liststyle" value="4"></td>
                </tr>
              </table></td>
          </tr>
          <tr> 
            <td height="28">������Ŀ�� 
              <?
       $tl = new TypeLink(0);
       $typeOptions = $tl->GetOptionArray(0,$cuserLogin->getUserChannel(),0,1);
       echo "<select name='typeid' style='width:284'>\r\n";
       echo "<option value='0' selected>������Ŀ...</option>\r\n";
       echo $typeOptions;
       echo "</select>";
		?>
            </td>
          </tr>
          <tr> 
            <td height="28"> �޶�Ƶ���� 
              <?
       echo "<select name='channel' style='width:100'>\r\n";
       echo "<option value='0' selected>����Ƶ��...</option>\r\n";
       $tl->dsql->SetQuery("Select ID,typename From #@__channeltype where ID>0");
	   $tl->dsql->Execute();
	   while($row = $tl->dsql->GetObject())
	   {
	      echo "<option value='{$row->ID}'>{$row->typename}</option>\r\n";
	   }
       echo "</select>";
		?>
              ���������ԣ� 
              <?
       echo "<select name='att' style='width:100'>\r\n";
       echo "<option value='0' selected>����...</option>\r\n";
       $tl->dsql->SetQuery("Select * From #@__arcatt");
	   $tl->dsql->Execute();
	   while($row = $tl->dsql->GetObject())
	   {
	      echo "<option value='{$row->att}'>{$row->attname}</option>\r\n";
	   }
       echo "</select>";
		?>
            </td>
          </tr>
          <tr> 
            <td height="28">���ü�¼������ 
              <input name="row" type="text" id="row" value="10" size="4">
              ����ʾ������ 
              <input name="col" type="text" id="col" value="1" size="4">
              �����ⳤ�ȣ� 
              <input name="titlelen" type="text" id="titlelen" value="24" size="4">
              ��1 �ֽ� = 0.5�������֣�</td>
          </tr>
          <tr> 
            <td height="28"> �߼�ɸѡ�� 
              <input name="types[]" type="checkbox" id="type[]" value="image" class="np">
              ������ͼ 
              <input name="types[]" type="checkbox" id="type[]" value="commend" class="np">
              �Ƽ� 
              <input name="types[]" type="checkbox" id="type[]" value="spec" class="np">
              ר�⡡�ؼ��֣� 
              <input name="keyword" type="text" id="keyword">
              ��&quot;,&quot;���ŷֿ���</td>
          </tr>
          <tr> 
            <td height="28">����˳�� 
              <select name="orderby" id="orderby" style="width:120">
                <option value="sortrank">�ö�Ȩ��ֵ</option>
                <option value="pubdate" selected>����ʱ��</option>
                <option value="senddate">¼��ʱ��</option>
                <option value="click">�����</option>
                <option value="id">�ĵ��ɣ�</option>
                <option value="lastpost">�������ʱ��</option>
                <option value="postnum">��������</option>
                <option value="rand">�����ȡ</option>
              </select>
              �� 
              <input name="order" type="radio"  class="np" value="desc" checked>
              �ɸߵ��� 
              <input type="radio" name="order" class="np" value="asc">
              �ɵ͵���</td>
          </tr>
          <tr> 
            <td height="28">�ĵ�����ʱ�䣺 
              <input name="subday" type="text" id="subday" value="0" size="6">
              ������ ��0 ��ʾ���ޣ�</td>
          </tr>
          <tr> 
            <td height="28">������¼��ʽ(InnerText)��</td>
          </tr>
          <tr>
            <td height="99"><textarea name="innertext" cols="80" rows="6" id="myinnertext">��[field:textlink/]([field:pubdate function=strftime('%m-%d',@me)/])<br/></textarea></td>
          </tr>
          <tr> 
            <td height="80"><font color="#CC6600">֧���ֶΣ�id,title,color,typeid,ismake,description,pubdate,senddate,arcrank,click,litpic,typedir,typename,arcurl,typeurl,<br>
              stime(pubdate ��&quot;0000-00-00&quot;��ʽ),textlink,typelink,imglink,image 
              ��ͨ�ֶ�ֱ����[field:�ֶ���/]��ʾ��<br>
              ��Pubdate����ʱ��ĵ��ò��� [field:pubdate function=strftime('%Y-%m-%d %H:%M:%S',@me)/]</font> 
            </td>
          </tr>
          <tr> 
            <td height="39">
            	<input name="Submit1" type="button" id="Submit1" onclick="DoSubmit('gettag')" value="����ģ����ñ��">
            	&nbsp;
              <input name="Submit2" type="button" id="Submit2" onclick="DoSubmit('savetag')" value="����Ϊ�Զ�����">
              </td>
          </tr>
        </table></td>
  </tr>
</form>
  <tr>
    <td valign="top" bgcolor="#EFF7E6">��������</td>
  </tr>
  <tr> 
      <td height="150" valign="top" bgcolor="#FFFFFF">
	  <div id='mdv' style='width:100%;height:130;'> 
        <iframe name="stafrm" frameborder="0" id="stafrm" width="100%" height="100%"></iframe>
      </div>
	  </td>
  </tr>
</table>
</center>
<?
$tl->Close();
?>
</body>
</html>