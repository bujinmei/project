"use strict";window.onload=function(){var i=getid("username1"),n=getid("password1"),r=getid("verifyUserNameMsg"),s=getid("confirm_password"),e=getid("btnn");i.onblur=function(){var e=i.value;if(e.trim()){ajax("get","../api/guestbook/index.php","m=index&a=verifyUserName&username="+e,function(e){var a=JSON.parse(e);a.code?r.style.color="red":r.style.color="green",r.innerHTML=a.message})}else alert("请输入用户名")},console.log(e),e.onclick=function(){var e=i.value,a=n.value,r=s.value;if(e.trim()&&a.trim()&&r.trim()){ajax("post","../api/guestbook/index.php","m=index&a=reg&username="+e+"&password="+a,function(e){var a=JSON.parse(e);alert(a.message)})}else alert("密码不能为空哦！")}};