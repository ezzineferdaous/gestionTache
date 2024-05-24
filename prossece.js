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
$(document).ready(function(){
    $("#formOrder").on("submit", function(event){
        event.preventDefault();
        
        $.ajax({
            url: "prossece.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
                $("#response").html(data);
                // Reload the page after successful insertion
                location.reload();
            },
            error: function(xhr, status, error){
                console.error("AJAX Error:", status, error);
            }
        });
    });
});



         

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

// refrech page

// $(document).ready(function(){
//     // Function to refresh the page
//     function refreshPage() {
//         location.reload(); // Reload the current page
//     }

//     // Set interval to refresh every 5 seconds (5000 milliseconds)
//     setInterval(refreshPage, 5000); // Adjust the interval time as needed (in milliseconds)
// });

