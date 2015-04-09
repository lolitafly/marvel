	
function isInteger(a)
{
    var reg=/^[-+]?\d+$/;
    return reg.test(a);
}

function isString(a){
   var reg=/^[a-z,A-Z]+$/;
   return reg.test(a);
}

function isLength(a,l){
	if(a.length==l){
		return true;
	}else{
		return false;
	}
}

function isRealNum(a){
	reg=/^-?\d+\.?\d*$/;
	return reg.test(a);
}

function isPhone(a){
	var reg= /^[1][358]\d{9}$/;
	return reg.test(a);
}

function isRealInRegion(a,min,max){
	if(!isRealNum(a)||Number(a)<min||Number(a)>max){
		return false;
	}
	return true;
}

