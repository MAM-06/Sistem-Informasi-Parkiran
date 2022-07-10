function searchFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("keyword");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabelcari");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function cariLaporan(cari) {
    var input, filter, table, tr, td, i, txtValue;
    input = cari.options[cari.selectedIndex].text;
    filter = input.toUpperCase();
    table = document.getElementById("carilaporan");
    tr = table.getElementsByTagName("tr");

    if (input != 'Semua') {
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    } else {
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                tr[i].style.display = "";
            }
        }
    }
}