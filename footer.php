</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($data_tanggal) ?>,
      datasets: [{
        label: 'Data Pemasukan',
        data: <?php echo json_encode($data_total) ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  var linechart = document.getElementById('line-chart');
  var chart = new Chart(linechart, {
    type: 'line',
    data: {
      labels: <?php echo json_encode($data_tanggal1) ?>, // Merubah data tanggal menjadi format JSON
      datasets: [{
        label: 'Data Pengeluaran',
        data: <?php echo json_encode($data_total1) ?>,
        borderColor: 'rgba(255,99,132,1)',
        backgroundColor: 'transparent',
        borderWidth: 2
      }]
    }
  });
</script>

<script>
  function inputAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>

<script>
  $(document).ready(function() {
    $('#example').DataTable({
      scrollY: 340,
      scrollX: true,
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#example1').DataTable({
      scrollX: true,
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#example2').DataTable({
      scrollX: true,
    });
  });
</script>

<script>
  new DataTable('#example3', {
    paging: false,
    scrollCollapse: true,
    scrollY: '600px'
  });

  new DataTable('#example4', {
    paging: false,
    scrollCollapse: true,
    scrollY: '300px'
  });
</script>
<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
      let arrowParent = e.target.parentElement.parentElement;
      arrowParent.classList.toggle("showMenu");
    });
  }

  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".fa-bars");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>

</html>