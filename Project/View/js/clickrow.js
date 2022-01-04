var table = document.getElementById('table');
for(var i = 1; i < table.rows.length; i++)
{
    table.rows[i].onclick = function()
    {
        document.getElementById("Flight_No").value = this.cells[0].innerHTML;
        document.getElementById("Flight_Name").value = this.cells[1].innerHTML;
         document.getElementById("Origin").value = this.cells[2].innerHTML;

        document.getElementById("Destination").value = this.cells[3].innerHTML;
        document.getElementById("Take_Off").value = this.cells[4].innerHTML;
        document.getElementById("Landing").value = this.cells[5].innerHTML;
        document.getElementById("Class").value = this.cells[6].innerHTML;
        document.getElementById("Rate").value = this.cells[7].innerHTML;
        document.getElementById("Route").value = this.cells[8].innerHTML;
    };
}