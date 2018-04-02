//ham su ly de lay video tu youtube               
$(document).ready(function(){
    $('.list-video li').click(function(){
        $(this).parent().siblings('.embed-player').attr('src','http://www.youtube.com/embed/'+$(this).children('a').attr('title'));                                     
    });
});
					                    