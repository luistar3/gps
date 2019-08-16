var count = "1";
  function addRow(in_tbl_name)
  {
    var tbody = document.getElementById(in_tbl_name).getElementsByTagName("TBODY")[0];
    // create row
    var row = document.createElement("TR");
    // create table cell 1
    var td1 = document.createElement("TD")
    var strHtml1 = "<FONT SIZE=\"+3\">*</FONT>";
    td1.innerHTML = strHtml1.replace(/!count!/g,count);
    // create table cell 2
    var td2 = document.createElement("TD")
    var strHtml2 = "<SELECT NAME=\"Animal\"><OPTION VALUE=\"Cat\">Cat<OPTION VALUE=\"Dog\">Dog<OPTION VALUE=\"Mouse\">Mouse</SELECT>";
    td2.innerHTML = strHtml2.replace(/!count!/g,count);
    // create table cell 3
    var td3 = document.createElement("TD")
    var strHtml3 = "<INPUT TYPE=\"text\" NAME=\"in_name\" SIZE=\"30\" MAXLENGTH=\"30\"  STYLE=\"height:24;border: 1 solid;margin:0;\">";
    td3.innerHTML = strHtml3.replace(/!count!/g,count);
    // create table cell 4
    var td4 = document.createElement("TD")
    var strHtml4 = "<INPUT TYPE=\"text\" NAME=\"in_name\" SIZE=\"5\" MAXLENGTH=\"5\"  STYLE=\"height:24;border: 1 solid;margin:0;\" READONLY>";
    td4.innerHTML = strHtml4.replace(/!count!/g,count);
    // create table cell 5
    var td5 = document.createElement("TD")
    var strHtml5 = "<INPUT TYPE=\"Button\" CLASS=\"Button\" onClick=\"delRow()\" VALUE=\"Delete Row\">";
    td5.innerHTML = strHtml5.replace(/!count!/g,count);
    // append data to row
    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);
    row.appendChild(td5);
    // add to count variable
    count = parseInt(count) + 1;
    // append row to table
    tbody.appendChild(row);
  }
  

  function delRow(btn)
  {

    swal({
      title: 'Eliminar Fila de Registro',
      text: 'Seguro que desea eliminar la fila seleccionada?',
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#141438',
      confirmButtonText: 'Si!',
      cancelButtonText: "Cancelar",
      closeOnConfirm: true,
      focusConfirm: true,
    }, function () {

        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);

        // var current = window.event.srcElement;
        // //here we will delete the line
        // while ( (current = current.parentElement)  && current.tagName !="TR");
        //      current.parentElement.removeChild(current);

    });

        
  }
