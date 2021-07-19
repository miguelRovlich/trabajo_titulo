var base = location.protocol+'//'+location.host;
document.addEventListener('DOMContentLoaded', function(){
	var md_alert_dom = document.getElementById('md_alert_dom');
	var md_alert_inside = document.getElementById('md_alert_inside');
	var md_alert_content = document.getElementById('md_alert_content');
	var md_alert_footer_other_btns = document.getElementById('md_alert_footer_other_btns');

	var md_alert_btn_close = document.getElementById('md_alert_btn_close');
	if(md_alert_btn_close){
		md_alert_btn_close.addEventListener('click', function(e){
			e.preventDefault();
			md_alert_status('hide');
		})
	}

});

function mdalert(data){
	md_alert_content.innerHTML = "";
	if(data){

		if(data.title){
			title = data.title;
		}else{
			title = 'MD Alert';
		}

		content = '';
		content += '<h2>'+title+'</h2>';
		if(data.type){
			content += '<div class="icon"><img src="'+base+'/static/images/'+data.type+'.png"></div>'; 
		}

		if(data.msg){
			msg = data.msg; 
		}else{
			msg = 'Error desconocido';
		}

		content += '<h5>'+msg+'</h5>';

		if(data.msgs){
			messages = JSON.parse(data.msgs);
			if(messages.length > 0){
				content += '<ul>';
				messages.forEach(function(element, index){
					content += '<li><i class="bi bi-bullseye"></i> '+element+'</li>';
				})
				content += '</ul>';
			}
		}

		actions_btns = '';
		if(data.actions){
			actions = JSON.parse(data.actions);
			if(actions.length > 0){
				actions.forEach(function(element,indes){
					if(element.url){
						actions_btns += '<a href="'+element.url+'" class="btn btn-'+element.type+'">'+element.name+'</a>'; 
					}else{
						actions_btns += '<a href="#" onclick="'+element.callback+'('+element.params+'); return false;" class="btn btn-'+element.type+'">'+element.name+'</a>'; 
					}
				});
			}
		}

		if(data.additional){
			additionals = JSON.parse(data.additional);
			if(additionals.hideclose){
				document.getElementById('md_alert_btn_close').style.display = 'none';
			}
		}


		md_alert_footer_other_btns.innerHTML = actions_btns;
		md_alert_content.innerHTML = content;
		md_alert_status('show');
	}
}

function md_alert_status(status){
	if(status == "show"){
		document.getElementsByTagName('body')[0].style.overflow = "hidden";
		document.getElementsByClassName('wrapper')[0].classList.add('blur');
		md_alert_dom.style.display = "flex";
		md_alert_dom.classList.remove('md_alert_animation_hide');
		md_alert_dom.classList.add('md_alert_animation_show');
		md_alert_inside.classList.add('scale_animation');
	}

	if(status == "hide"){
		document.getElementsByTagName('body')[0].style.removeProperty("overflow");
		document.getElementsByClassName('wrapper')[0].classList.remove('blur');
		md_alert_dom.style.display = "none";
		md_alert_dom.classList.add('md_alert_animation_hide');
		md_alert_dom.classList.remove('md_alert_animation_show');
		md_alert_inside.classList.remove('scale_animation');
	}
}