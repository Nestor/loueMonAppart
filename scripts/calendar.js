class Calendar {

    constructor(div, width, height){
        this.selector = div;
        this.width = width;
        this.height = height;
        this.daysSelected = [];
        // this.month = month;
        this.init();
    }
    remplir(arr) {
        var elems = $(this.selector+" #cal_body tr td");
        for(var i=0;i<elems.length;i++) {
            
            for(var e=0;e<arr.length;e++) {
                if($(elems[i]).attr('data-date') == arr[e]) {
                    $(elems[i]).css('background-color', 'red');
                }
            }
            console.log($(elems[i]).attr('data-date'));
        }
    }
    click(elem){
        var date = new Date();
        var $element = $(elem.target).attr("data-date");
        var data = $element.split("/");
        var day, moi, annee;

        day = data[0];
        moi = data[1];
        annee = data[2];

        if(day > date.getDate() && moi>=date.getMonth() && annee>=date.getFullYear()) {
            $(this.selector+" .log").text('');
            if($(elem.target).attr("data-active") == "false") {
                $(elem.target).attr("data-active", "true")
                $(elem.target).css('background-color', 'yellow');
                this.daysSelected.push($(elem.target).text()+"/"+moi+"/"+annee);
            }else{
                $(elem.target).attr("data-active", "false")
                $(elem.target).css('background-color', 'transparent');
                this.searhAndDelete($(elem.target).text()+"/"+moi+"/"+annee);
            }
        } else {
            $(this.selector+" .log").text('Veuillez sélectionner un(des) jour(s) à venir');
        }
        console.log(this.daysSelected);
    }
    searhAndDelete($days) {
        for(var i=0;i<this.daysSelected.length;i++) {
            if($days == this.daysSelected[i]) {
                this.daysSelected.splice(i, 1);
            }
        }
    }
    init() {
        var date = new Date();
        var jour = date.getDate();
        var moi = date.getMonth();
        // var moi = this.month;
        var annee = date.getYear();
        var html = "";
        if(annee<=200) {
            annee += 1900;
        }

        var mois = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        var jours_dans_moi = new Array(31,28,31,30,31,30,31,31,30,31,30,31);

        if(annee%4 == 0 && annee!=1900) {
            jours_dans_moi[1]=29;
        }
        var total = jours_dans_moi[moi];
        var date_aujourdui = jour+' '+mois[moi]+' '+annee;
        var dep_j = date;
        dep_j.setDate(1);
        if(dep_j.getDate()==2) {
            dep_j=setDate(0);
        }
        dep_j = dep_j.getDay();

        html+='<div class="log"></div><table class="cal_calendrier" border=1><tbody id="cal_body"><tr><th colspan="7">'+date_aujourdui+'</th></tr>';
        html+='<tr class="cal_j_semaines"><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr><tr>';

        var sem = 0;
        for(var i=1;i<=dep_j;i++) {
            var date = jours_dans_moi[moi-1]-dep_j+i;
            var mois = moi-1;
            html+='<td class="cal_jours_av_ap" data-date="'+date+"/"+mois+"/"+annee+'">'+(jours_dans_moi[moi-1]-dep_j+i)+'</td>';
            sem++;
        }
        for(var i=1;i<=total;i++) {
            if(sem==0) {
                html+='<tr>';
            }
            if(jour==i) {
                html+='<td class="cal_aujourdhui" data-active="false" data-date="'+i+"/"+moi+"/"+annee+'">'+i+'</td>';
            } else {
                html+='<td data-active="false" data-date="'+i+"/"+moi+"/"+annee+'">'+i+'</td>';
            }
            sem++;
            if(sem==7) {
                html+='</tr>';
                sem=0;
            }
        }
        for(var i=1;sem!=0;i++) {
            document.write('<td class="cal_jours_av_ap">'+i+'</td>');
            sem++;
            if(sem==7) {
                document.write('</tr>');
                sem=0;
            }
        }
        html+='</tbody></table><a href="#" class="btn btn-primary valider">Valider</a>';
        // return true;
        $(this.selector).html(html);

        var that = this;
        $(this.selector+" #cal_body tr td").click(function(elem) {
            that.click(elem, moi, annee);
        });
        $(this.selector+" .valider").click(function() {
            var a = document.cookie;
            var b = a.split('; ');
            var c = b[0].substr(b['0'].length-1);
            // console.log("AnnonceID="+c);
            
            var donnees = "";
            for(var i=0; i<that.daysSelected.length;i++) {
                donnees+=that.daysSelected[i]+',';
            }
            document.cookie = "dateReserved="+donnees+";expires=Thu, 18 Dec 2018 12:00:00 UTC";
            var f = document.cookie;
            console.log(f);
            window.location.replace("http://127.0.0.1/airbnb/location/login");
    });

        $(this.selector+" .cal_calendrier").css("text-align", "center");
        $(this.selector+" .cal_aujourdhui").css({
            backgroundColor: "cyan"
        });
    }
}