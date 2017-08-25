class nCalendar {

    constructor(div){
        this.selector = div;
        this.daysSelected = [];

        this.monthInYear = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        this.dayInMonth = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
        this.nbrDayInMonth = [31,28,31,30,31,30,31,31,30,31,30,31];

        this.dateDay = null;
        this.dateMonth = null;
        this.dateYear = null;

        this.init();
    }

    init() {
        var date = new Date();
        var html = "";
        this.dateDay = date.getDate();
        this.dateMonth = date.getMonth();
        this.dateYear = date.getFullYear();
        
        html+='<table border=1><tr>';
        for(var a=0;a<this.dayInMonth.length;a++) {
            html+='<th>'+this.dayInMonth[a]+'</th>';
        }
        html+='</tr>';
        html+='<tr>';
        for(var b=1;b<31;b++) {
            html+='<td>'+b+'</td>';
        }
        html+='</tr>';
        html+='</table>';
        // html += '<table border=1>';
        // html += '<tr>';
        // html += '<th>Nom</th>';
        // html += '</tr>';
        // html += '<tr>';
        // html += '<td>Carmen</td>';
        // html += '</tr>';
        // html += '</table>';

        $(this.selector).html(html);
        this.debug();
    }
    debug() {
        console.log(this.dateDay+"/"+this.dateMonth+"/"+this.dateYear);
        console.log(this.monthInYear);
        console.log(this.dayInMonth);
        console.log(this.nbrDayInMonth);
        for(var a=0;a<this.monthInYear.length;a++) {
            console.log(this.monthInYear[a]+": "+this.nbrDayInMonth[a]+" jours");
        }
    }
}