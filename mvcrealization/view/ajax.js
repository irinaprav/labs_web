$(document).ready(function() {


	
    $(".log").click(function send() { 

        var login = document.getElementById('login').value;
		var password = document.getElementById('password').value;

		$.ajax({ 
			   		type: 'POST', 
			   		url: './index.php?controller=auth', 
			   	   	data: {login:login,password:password}, 
		           	success: function(resp) {
     					if(resp == "ok"){
    						alert('successfully logged in');
						}else{
							$('body').load(window.location.href+'body');
							$("#popup").hide();
							$('.close').trigger('click');
						}
					},
					error: function (xhr, ajaxOptions, thrownError) { 
		            	alert(xhr.status); 
		            	alert(thrownError); 
		         		},
		});
	});

	$(".authorization").click(function sendd() { 
		var login = document.getElementById('logina').value;
		var password = document.getElementById('passworda').value;
		var name = document.getElementById('name').value;
		var lastname = document.getElementById('lastname').value;
		var picture = document.getElementById('picture').value;


		$.ajax({
			   		type: 'POST', 
			   		url: './index.php?controller=register', 
			   	   	data: {login:login,password:password,name:name,lastname:lastname,picture:picture},
		           	success: function(resp) {
     					if(resp == "ok"){
    						alert('successfully logged in');
						}else{
							$('body').load(window.location.href+'body');
							$("#popup").hide();
							$('.close').trigger('click');
						}
					},
					error: function (xhr, ajaxOptions, thrownError) { 
		            	alert(xhr.status); 
		            	alert(thrownError); 
		         		},
		});
	});

	$(".loghref").click(function sendd() { 
		$.ajax({ 
			   		type: 'POST', 
			   		url: './index.php?controller=logout',  
		           	success: function(resp) {
     					if(resp == "ok"){
    						alert('successfully logged in');
						}else{
							$('body').load(window.location.href+'body');
							$("#popup").hide();
							$('.close').trigger('click');
						}
					},
					error: function (xhr, ajaxOptions, thrownError) { 
		            	alert(xhr.status); 
		            	alert(thrownError); 
		         		},
		});
	});
});