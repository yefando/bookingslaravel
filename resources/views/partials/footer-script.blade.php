<script>
  $(document).ready(function() {
    App.init();
  });
</script>
<script src="assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<script>
  const currentUrl = window.location.href;
  const venueLink = document.querySelector('#venue a');
  const bookingsLink = document.querySelector('#bookings a');

  if (currentUrl.includes('/venue')) {
    venueLink.parentElement.classList.add('active');
  } else if (currentUrl.includes('/bookings')) {
    bookingsLink.parentElement.classList.add('active');
  }
</script>

<script>
  var harga = document.getElementById("hargaVenue");
  harga.addEventListener("keyup", function(event) {
    // Menghilangkan karakter selain angka
    var nominal = harga.value.replace(/\D/g, '');
    // Menambahkan penghubung titik setiap 3 digit
    nominal = nominal.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    // Mengubah nilai input dengan nominal yang sudah diolah
    harga.value = nominal;
  });
</script>

<script>
  $(document).ready(function() {
    var table = $('#table').DataTable({
      responsive: true
    });

    new $.fn.dataTable.FixedHeader(table);
  });
</script>
<!-- END PAGE LEVEL SCRIPTS -->