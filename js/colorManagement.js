$(document).ready(function() {
    loadColors(); // Load colors when the document is ready for edit form

    $('#addColorForm').submit(function(e) {
        e.preventDefault();
        const colorName = $('#colorName').val();
        const hexValue = $('#hexValue').val();

        $.post('addColor.php', { name: colorName, hex: hexValue }, function(response) {
            $('#colorOperationResult').html(response);
            loadColors(); // Reload colors to update dropdown after adding
        }).fail(function() {
            $('#colorOperationResult').html('Error: Could not add color. Please try again.');
        });
    });

    $('#editColorForm').submit(function(e) {
        e.preventDefault();
        const id = $('#editColorId').val();
        const name = $('#editColorName').val();
        const hex = $('#editHexValue').val();

        $.post('editColor.php', { id: id, name: name, hex: hex }, function(response) {
            $('#colorOperationResult').html(response);
            loadColors(); // Reload colors to reflect changes
        }).fail(function() {
            $('#colorOperationResult').html('Error: Could not update color. Please try again.');
        });
    });
});

function loadColors() {
    $.get('getColors.php', function(data) {
        $('#editColorId').empty().html(data);
        $('#deleteColorId').empty().html(data);
    });
}

function confirmDelete() {
    var colorId = $('#deleteColorId').val();
    if (!colorId) {
        $('#colorOperationResult').html('Please select a color to delete.');
        return;
    }
    var confirmAction = confirm("Are you sure you want to delete this color?");
    if (confirmAction) {
        deleteColor(colorId);
    } else {
        $('#colorOperationResult').html('Deletion canceled.');
    }
}

function deleteColor(colorId) {
    $.post('deleteColor.php', { id: colorId }, function(response) {
        $('#colorOperationResult').html(response);
        loadColors(); // Reload colors to update dropdowns after deletion
    }).fail(function() {
        $('#colorOperationResult').html('Error: Could not delete color. Please try again.');
    });
}