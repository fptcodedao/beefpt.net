function Sort(type){
	console.log(type);
	var url = '';
	if (type == 'default') {
		url = 'product';
	}else if(type == 'priced'){
		url = 'product/priced';
	}
	else if(type == 'pricea'){
		url = 'product/pricea';
	}
	else if(type == 'asc'){
		url = 'product/asc';
	}
	window.location.href = window.location.origin +"/"+ url;
};