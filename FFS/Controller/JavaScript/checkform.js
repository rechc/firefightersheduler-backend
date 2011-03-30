 //<<Regulaere Ausdruecke>>
      var re_email = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/;
      var re_string = /^([a-zA-Z-]+\s)*[a-zA-Z-]+$/;
//      var re_telefon = /^[0-9]+$/;
//      var re_strasse = /^([a-zA-Z0-9-\.]+\s)+[a-zA-Z0-9-]*$/;
      var re_integer = /^[0-9]+$/; //positiv ! kann mach auch testen mit numeric

//<<Initialisierung der Kontrollwerte>>
      string_checked = new Array();
//      tel_checked = new Array();
//      var str_checked = true;
//      var plz_checked = true;
      var mail_checked = true;
      var anzahl_checked = true;
      var all_string = 0;
//      var all_tel_check = 0;

      function checkdata(){
          alert("starte check data")
            var send = true;
            for (j = 0; j <= document.sendform.string.length; j++) {
              string_checked[j] = 0;
            }
            for (j = 0; j <= document.sendform.tel.length; j++) {
              tel_checked[j] = 0;
            }

            //<<Variablen auslesen>>
            var string = new Array();
            //Name
            string[0] = document.sendform.lastname.value;
            //Vorname
            string[1] = document.sendform.firstname.value;
//            var telefon = new Array();
//            //telefon privat
//            telefon[2] = document.sendform.tel[2].value;
//            //strasse
//            var strasse = document.sendform.strasse.value;
//            //plz
//            var plz = document.sendform.plz.value;
            //email
            var mail = document.sendform.email.value;
            //anzahl
            var bday = document.sendform.bday.value;

            //>>--------STRING CHECK----------------------------->>
            for (i = 0; i < string.length; i++) {
              num = "string_err" + i;
              if (string[i].match(re_string)== null
                  || string[i].length == 0) {
                document.images[num].src = Fehlergif.src;
                string_checked[i]--;
              } else {
                document.images[num].src = gifspacer.src;
                string_checked[i]++;
              }
            }
            all_string = string_checked[0] + string_checked[1]
                         + string_checked[2] + string_checked[3];
            //<<------STRING CHECK ENDE--------------------------<<

//            //>>------Strassen CHECK----------------------------->>
//            if (strasse.match(re_strasse) == null
//                || strasse.length == 0) {
//              document.strasse_err.src = Fehlergif.src;
//              str_checked = false;
//            } else {
//              document.strasse_err.src = gifspacer.src;
//              str_checked=true;
//            }
            //<<------Strassen CHECK ENDE------------------------<<

            //>>------Telefoncheck------------------------------->>
//            for (i = 0; i < telefon.length; i++) {
//              var obj = "tel_err" + i;
//              if (telefon[i].match(re_telefon) == null
//                  || telefon[i].length == 0) {
//                document.images[obj].src = Fehlergif.src;
//                tel_checked[i]--;
//              } else {
//                document.images[obj].src = gifspacer.src;
//                tel_checked[i]++;
//              }
//            }
//            var all_tel_check = tel_checked[0] + tel_checked[1]
//                                + tel_checked[2];
            //<<------Telefoncheck-ENDE---------------------------<<

            //>>------PLZ CHECK----------------------------------->>
//            if (plz.match(re_integer) == null || plz.length != 5) {
//              document.plz_err.src = Fehlergif.src;
//              plz_checked = false;
//            } else {
//              document.plz_err.src = gifspacer.src;
//              plz_checked=true;
//            }
//            //<<------PLZ CHECK-ENDE----------------------------<<

            //>>------E-MAIL CHECK------------------------------>>
            if (mail.match(re_email) == null
                || mail.length == 0) {
              document.mail_err.src = Fehlergif.src;
              mail_checked = false;
            } else {
              mail_checked=true;
              document.mail_err.src = gifspacer.src;
            }
            //<<------E-MAIL CHECK-ENDE-------------------------<<

            //>>-------------ENDAUSWERTUNG---------------------->>
            if (all_string != 4) {
              alert("Stringfehler");
              send = false;
            }
//            if (str_checked == false) {
//              alert("Strassenfehler");
//              send = false;
//            }
//            if (plz_checked == false) {
//              alert("Falsche PLZ");
//              send = false;
//            }
//            if (all_tel_check != 3) {
//              alert("Telefonfehler");
//              send = false;
//            }
            if (mail_checked == false) {
              alert("Falsche E-Mail");
              send = false;
            }
            if (anzahl_checked == false) {
              alert("Falsche Anzahl");
              send = false;
            }
            //<<-----------ENDAUSWERTUNG-ENDE--------------------<<

            //>>-------------Ausgabe der Daten------------------->>
            if (send) {
              ausgabe = '<table><tr><td width="150">Leitername:'
                   + '</td><td>' + document.sendform.string[0].value
                   + '</td></tr>'
                   + '<tr><td>Name:</td><td>'
                   + document.sendform.string[1].value + '</td></tr>'
                   + '<tr><td>Vorname:</td><td>'
//                   + '<tr><td>Telefon privat:</td><td>'
//                   + document.sendform.tel[0].value + '</td></tr>'
//                   + '<tr><td>Telefon dienstlich:</td><td>'
//                   + document.sendform.tel[1].value + '</td></tr>'
//                   + '<tr><td>Fax:</td><td>'
//                   + document.sendform.tel[2].value + '</td></tr>'
//                   + '<tr><td>Strasse</td><td>'
//                   + document.sendform.strasse.value + '</td></tr>'
//                   + '<tr><td>Plz.:</td><td>'
//                   + document.sendform.plz.value + '</td></tr>'
                   + '<tr><td>Email:</td><td>'
                   + document.sendform.email.value + '</td></tr>'
                   + '<tr><td>Geburtsdatum:</td><td>'
                   + document.sendform.email.value + '</td></tr>'
                   + '</table>';
              document.write(ausgabe);
            }
            //<<-------------------------------------------------<<
            alert("Alle Eingaben geprüft");
      } //Ende von checkdata()