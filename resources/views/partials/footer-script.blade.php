<script>
    $(document).ready(function () {
      App.init();
    });
  </script>
  <script src="assets/js/custom.js"></script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->

  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="plugins/table/datatable/datatables.js"></script>
  <script>
    $("#zero-config").DataTable({
      dom:
        "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      oLanguage: {
        oPaginate: {
          sPrevious:
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
          sNext:
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        },
        sInfo: "Showing page _PAGE_ of _PAGES_",
        sSearch:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        sSearchPlaceholder: "Search...",
        sLengthMenu: "Results :  _MENU_",
      },
      stripeClasses: [],
      lengthMenu: [7, 10, 20, 50],
      pageLength: 7,
    });
  </script>
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
  <!-- END PAGE LEVEL SCRIPTS -->
