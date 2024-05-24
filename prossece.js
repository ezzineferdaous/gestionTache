$(document).ready(function () {
    // Fetch tasks
    fetchTasks();

    function fetchTasks() {
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: { action: 'fetchAll' },
            success: function (response) {
                $('#orderTable').html(response);
                $('#taskTable').DataTable();
            }
        });
    }

    // Create task
    $('#formOrder').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: $(this).serialize() + '&create=true',
            success: function (response) {
                alert(response);
                $('#createModel').modal('hide');
                fetchTasks();
            }
        });
    });

    // Edit task
    $(document).on('click', '.editBtn', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: { id: id, action: 'edit' },
            success: function (response) {
                var data = JSON.parse(response);
                $('#edit_id').val(data.id);
                $('#edit_titre').val(data.titre);
                $('#edit_date_description').val(data.date_description);
                $('#edit_date_dechéance').val(data.date_dechéance);
                $('#edit_id_tache').val(data.id_tache);
                $('#edit_description').val(data.description);
                $('#edit_id_utilisateur').val(data.id_utilisateur);
                $('#edit_id_categorie').val(data.id_categorie);
                $('#edit_id_liste').val(data.id_liste);
                $('#edit_statut').val(data.statut);
                $('#edit_priorite').val(data.priorite);
                $('#editModel').modal('show');
            }
        });
    });

    // Update task
    $('#formEditOrder').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: $(this).serialize() + '&update=true',
            success: function (response) {
                alert(response);
                $('#editModel').modal('hide');
                fetchTasks();
            }
        });
    });

    // Delete task
    $(document).on('click', '.deleteBtn', function () {
        if (confirm('Are you sure you want to delete this task?')) {
            var id = $(this).attr('data-id');
            $.ajax({
                url: 'process.php',
                method: 'POST',
                data: { id: id, action: 'delete' },
                success: function (response) {
                    alert(response);
                    fetchTasks();
                }
            });
        }
    });
});
