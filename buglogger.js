$(document).ready(function(){
    $('#submit').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var pass = $('#pass').val();
        var eMail = $('#eMail').val();
        $.ajax({
            type: "POST",
            url: "insert.php",
            data: "fname="+fname+"&lname="+lname+"&pass="+pass+"&eMail="+eMail,
            success: function(data){
                alert('Submitted');
            }
        });
    });

    $("#nhome").click(function(e){
        e.preventDefault();
        var page = "home.php";
        $('#inputWrapper').load(page);
    });

    $("#nadduser").click(function(e){
        e.preventDefault();
        var page = "adduser.php";
        $('#inputWrapper').load(page);
    });

    $("#newissue").click(function(e){
        e.preventDefault();
        var page ="newissue.php";
        $('#inputWrapper').load(page);
    });

    $("#home-createNewIssueBtn").click(function(e){
        e.preventDefault();
        page ="newissue.php";
        $('#inputWrapper').load(page);
    });

    $("#home-openBtn").click(function(e){
        e.preventDefault();
        page ="openTicket.php";
        $('#inputWrapper').load(page);
    });

    $(".pagE").click(function(e){
        e.preventDefault();
        let title = e.target.innerHTML;            
        loadIssuePage(title);
    });

    function loadIssuePage(title) {
        event.preventDefault();
        let page = "displayIssue.php?title=" + title;
        alert(page);
        $('#inputWrapper').load(page);
    }


    $("#home-myTicketsBtn").click(function(e){
        e.preventDefault();
        page ="myTickets.php";
        $('#inputWrapper').load(page);
    });

    $("#home-allBtn").click(function(e){
        e.preventDefault();
        page ="home.php";
        $('#inputWrapper').load(page);
    });

    $("#nlogout").click(function(e) {
        e.preventDefault();
        httpRequest = new XMLHttpRequest();
        var url = "logout.php";
        httpRequest.onreadystatechange = processLogout;
        httpRequest.open('GET', url);
        httpRequest.send();
    });

    function processLogout() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                alert("You have been logged out. Bye!");
                window.location = "userlogin.html";
            }
        }
    }


    $('#upload').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        var title = $('#title').val();
        var descrip = $('#descrip').val();
        var adminis = $('#adminis').val();
        var descriptype = $('#descriptype').val();
        var prior = $('#prior').val();
        $.ajax({
            type: "POST",
            url: "submitIssue.php",
            data: "title="+title+"&descrip="+descrip+"&adminis="+adminis+"&descriptype="+descriptype+"&prior="+prior,
            success: function(data){
                alert("Data Sent");
            }
        });
    });
});