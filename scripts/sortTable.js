function sortTable(order, top5) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("listtable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
    while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[0];
            y = rows[i + 1].getElementsByTagName("TD")[0];

            if (order == "asc"){
                //check if the two rows should switch place:
                if (Number(x.innerHTML) > Number(y.innerHTML)) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
                }
            }
            else {
                //check if the two rows should switch place:
                if (Number(x.innerHTML) < Number(y.innerHTML)) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                    }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }

    if (top5 == true) {
        rows = table.rows;

        for (i=1; i < 6; i++){
            x = rows[i].getElementsByTagName("TD")[3];
            x.innerHTML = "<td> Top 5 Cars </td>";
        }
    }

}
