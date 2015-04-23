function showScripts(str) {
    if (str == "") {
        document.getElementById("championScripts").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("championScripts").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","engine/scripts.php?id="+str,true);
        xmlhttp.send();
    }
}

function voteScript(champ, script, vote) {
        var updateDiv = "vote-"+script;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(updateDiv).innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET","engine/vote.php?champ_id="+champ+"&script_id="+script+"&vote="+vote,true);
        xmlhttp.send();
}



$("#championModal").on('click', '.upvote', function() {
    _this = $(this);
    voteScript(_this.data("champion"), _this.data("script"), "1");
});

$("#championModal").on('click', '.downvote', function() {
    _this = $(this);
    voteScript(_this.data("champion"), _this.data("script"), "-1");
});

$(function() {
  $.getJSON("js/data/champions.json", function(json) {

    $.each(json.data, function(key, value) {
      $( "#championGrid .row" ).append('<div class="col-xs-3 col-sm-2"><div class="champion" data-toggle="modal" data-target="#myModal" data-id="'+value.id+'" data-name="'+value.name+'" data-tags="'+value.tags+'"><img src="http://ddragon.leagueoflegends.com/cdn/5.6.2/img/champion/'+value.image.full+'"/><p class="name">'+value.name+'</p></div></div>');
    });
  });
});

$("#championGrid .row").on('click', '.champion', function() {
    _this = $(this);
    document.getElementById("championModalLabel").innerHTML = _this.data("name");
    showScripts(_this.data("id"));
});
