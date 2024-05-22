$(document).ready(function() {
    // Hide the modal by default
    $('#createModel').modal('hide');

    // Show the modal when the button is clicked
    $('#showModalButton').click(function() {
        $('#createModel').modal('show');
    });

    // Initialize DataTables on the table
    $('#orderTable table').DataTable({
        "columnDefs": [
            // Your column definitions here
        ],
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true
    });
});
