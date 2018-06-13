//功能：正则验证
//参数：
//     验证类型
//		（如：用户名，email，手机号码，身份证号码，密码）
//       username:表示用户名
//       email:表示邮箱
//       phoneNumber:手机号码
//       personId:身份证号码
//       password:密码
//     要验证的字符串
//返回值：true：验证通过，false：验证失败

function checkAll(type,value){
	var reg=null;
	switch(type){
		case "userName":reg=/^[a-zA-Z_]\w{5,15}$/; break;
		case "password":reg=/^[a-zA-Z0-9_\.\+\-]{8,16}$/; break;
		case "post":reg=/^[1-9]\d{5}$/; break;
		case "mail":reg=/^\w+@[a-zA-Z0-9]+\.(com|cn|net|vip|top)$/; break;
		case "phoneNumber":reg=/^1[^0126]\d{9}$/; break;
		case "person":reg=/^[1-9]\d{5}(19|20)\d{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])\d{3}[0-9xX]$/; break;
		case "date":reg=/^(19|20)\d{2}[\-\.\/](0[1-9]|1[0-2])[\.\-\/](0[1-9]|1[0-9]|2[0-9]|3[0-1])$/; break;
		case "ip":reg=/^((\d|\d{2}|1[0-9][0-9]|2[0-4][0-9]|25[0-5])\.){3}(\d|\d{2}|1[0-9][0-9]|2[0-4][0-9]|25[0-5])$/; break;		
		default :;
	}
	if(reg!=null){
		if(reg.test(value)){
			return true;
		}
	}
	return false;
}