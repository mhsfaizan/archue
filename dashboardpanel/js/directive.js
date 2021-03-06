app.directive('loginDir',()=>{
	return{
		link:(scope,elem,attr)=>{
			
		}
	}
})
app.directive("myNav",()=>{
	return{
		templateUrl:"include/nav.php",
		link:(scope,elem,attr)=>{
			elem.find('.open-btn').click(()=>{
				$('.open-btn').hide();
				$('.close-btn').show();
				$('#sidenav').css('margin-left','0px');
			})
			elem.find('.close-btn').click(()=>{
				$('.close-btn').hide();
				$('.open-btn').show();
				$('#sidenav').css('margin-left','-270px');
			})
			elem.find('.sidenav-li').not('.more-drp-btn,.material-drp-btn').click(function() {
				$('.close-btn').hide();
				$('.open-btn').show();
				$('#sidenav').css('margin-left','-270px');
			})
			// angular.element(window).on("scroll",()=>{
			// 	if(angular.element(window).scrollTop()>160){
			// 		elem.find(".navbar-container").addClass("fixed-nav");
			// 		elem.find(".navbar-container .heading").removeClass("heading-hide");
			// 	}
			// 	else{
			// 		elem.find(".navbar-container .heading").addClass("heading-hide");
			// 		elem.find(".navbar-container").removeClass("fixed-nav");
			// 	}
			// })
			// elem.find(".navbar-container ul li>a").on('click',(x)=>{
			// 	elem.find(".navbar-container ul li a").removeClass('active');
			// 	angular.element(x.target).addClass('active');
			// })
		}
	}
});
app.directive('validFile', function () {
    return {
        require: 'ngModel',
        link: function (scope, el, attrs, ngModel) {
            ngModel.$render = function () {
                ngModel.$setViewValue(el.val());
            };

            el.bind('change', function (e) {
                scope.$apply(function () {
                    ngModel.$render();
                });
            });
        }
    };
});
/*portfolio directive for validation*/
app.directive("portfolioValid",()=>{
    return{
        require: 'ngModel',
        link:(scope,elem,attr,ngModel)=>{
            ngModel.$render =  ()=>{
                ngModel.$setViewValue(elem.val());
            };
            elem.bind('change',()=>{
               if(scope.validatePortfolioFile(elem[0].files[0].name)){
                 console.log("validated");
                 scope.portfolioFile  = elem[0].files[0];
               }
               else{
                console.log("not validated");
                elem.val("");
                scope.$apply(()=>{
                    ngModel.$render();
                });
               }
            });
        }
    }
})
/*upload blog directive */
app.directive("blogDir",()=>{
    return{
        link:(scope,elem,attr)=>{
            var editor = elem.find("#editor");
            editor
            .contents()
            .prop('designMode','on');
            scope.onBlogSubmit = ()=>{
                var data = editor.contents().find('body').html(); 
                scope.myBlog  = data;
                if(scope.myBlog!=""){
                    scope.submitBlog();
                }
                else{
                    alert("please fill the content section")
                }
            }
        }
    }
})
app.directive("imageViewer",()=>{
    return{
        link:(scope,elem,attr)=>{
            /*elem.find(".small-images-view img").click(()=>{
                console.log(this);
            });*/
            $(".small-images-view").click(($event)=>{
                var atr = angular.element($event.target).attr('src');
                $(".images>img").attr("src",atr);
            })
        }
    }
})
app.filter("myTime",()=>{
	return (time)=>{
		return time.split(" ").pop();
	}
})
 app.filter("myDate",()=>{
 	return function(date){
 		return date.split(" ")[0];
 	}
 })
 app.filter("getSingleImage",()=>{
 	return function(obj){
 		return obj.split(",").pop();
 	}
 })
 app.filter("converToDate",()=>{
    var myfunc = (obj)=>{
        let x = new Date(obj);
        return x;
    }
    return myfunc;
 })
 /*js*/
function bold(x){
    editor.document.execCommand('bold',false,null);
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function italic(x){
    editor.document.execCommand('italic',false,null);
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function link(x){
    var link = prompt("enter link","http://www.")
    if(link != null){
        editor.document.execCommand('createlink',false,link);
    }
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function heading(){
    var h = $("#head option:selected").attr('value');
    editor.document.execCommand('formatBlock', false,h);
}
function heading2(x){
    editor.document.execCommand('formatBlock', false, '<h2>');
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function jleft(x){
    editor.document.execCommand('justifyLeft', false, '');
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function jright(x){
    editor.document.execCommand('justifyRight', false, '');
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function justify(x){
    angular.element(x).toggleClass("btn-active");
    editor.document.execCommand('justifyFull', false, '');
    angular.element(x).siblings().removeClass("btn-active");
}
function orderlist(x){
    angular.element(x).toggleClass("btn-active");
    editor.document.execCommand('insertOrderedList');
    angular.element(x).siblings().removeClass("btn-active");
}
function unorderlist(x){
    angular.element(x).toggleClass("btn-active");
    editor.document.execCommand('insertUnorderedList');
    angular.element(x).siblings().removeClass("btn-active");
}
function fontsize(x){
    editor.document.execCommand('fontSize',false,"7");
    var fontelem = editor.document.getElementsByTagName('font');
    for(let i=0;i<fontelem.length;i++){
        if(fontelem[i].size=="7"){
            fontelem[i].removeAttribute("size");
            fontelem[i].style.fontSize = x.value+"px";
        }
    }
}
/*function insertimage(){
    var image = prompt("Enter the Link of Image","http://www.");
    if(image != null){
        editor.document.execCommand("insertImage",false,image);
    }
}*/