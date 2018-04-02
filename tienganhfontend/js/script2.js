//goi du lieu tu trang getbaiviet
$(function(){
        $('li').click(function() {
        // $('#content').text($(this).text()+'-'+$(this).attr('value'));
        var objHTTP = new XMLHttpRequest();
        var id = $(this).attr('value');
        
        objHTTP.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)

            {
                $('.tin').html(this.responseText);
            }
        }
        objHTTP.open('GET', 'getbaiviet.php?id=' + id , true);
        objHTTP.send();
    });
});
//goi du lieu tu trang getdethi
$(function(){
        $('li').click(function() {
        // $('#content').text($(this).text()+'-'+$(this).attr('value'));
        var objHTTP = new XMLHttpRequest();
        var id = $(this).attr('value');
        
        objHTTP.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)

            {
                $('.tin').html(this.responseText);
            }
        }
        objHTTP.open('GET', 'getdethi.php?id=' + id , true);
        objHTTP.send();
    });
});
//goi du lieu tu trang getnoidungbaiviet  
/*$(function(){
        $('li h2 a ').click(function() {
        // $('#content').text($(this).text()+'-'+$(this).attr('value'));
        var objHTTP = new XMLHttpRequest();
        var id = $(this).attr('value');
        
        objHTTP.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)

            {
                $('.tin').html(this.responseText);
            }
        }
        objHTTP.open('GET', 'getnoidungbaiviet.php?id=' + id , true);
        objHTTP.send();
    });
});*/
