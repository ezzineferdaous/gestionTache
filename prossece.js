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

// crée une tache
$(document).ready(function() {
    $("#formOrder").on("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        // Validate form fields
        var titre = $('#titre').val().trim();
        var date_description = $('#date_description').val().trim();
        var date_dechéance = $('#date_dechéance').val().trim();

        if (titre === '' || date_description === '' || date_dechéance === '') {
            // If any field is empty, display an error message
        }
    }
)}
);
         

// récupére les taches
// getBills();
// function getBills(){
//     $.ajax({
//         url: 'prossece.php',
//         data: {action : 'fetch'},
//         success: function (response){
//           $('#orderTable').html(response);
//           $('table').DataTable();
//         }
//     })
// }

$(document).ready(function() {
    // Fetch tasks
    getTasks();

    function getTasks() {
        $.ajax({
            url: 'prossece.php',
            method: 'POST',
            data: {action: 'fetch'}, // Sending action parameter to indicate fetch action
            success: function(response) {
                $('#orderTable').html(response); // Populate the table with fetched tasks
            },
            error: function() {
                $('#orderTable').html("<p>An error occurred while fetching tasks.</p>");
            }
        });
    }
});
