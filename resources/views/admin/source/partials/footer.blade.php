</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script src="{{ asset('assets/js/index.js') }}"></script> --}}
<script>
    // ADD DATA TABLES 
    new DataTable('#userTable');
    new DataTable('#paymentTable');
    new DataTable('#categoryTable');
    new DataTable('#jobTable');
    new DataTable('#applicationsTable');
    new DataTable('#userReviewsTable');
    new DataTable('#ReviewTable');
    new DataTable('#contactTable');

</script>
</body>

</html>