//Function to call the print view
function setPrintView(){
    $('#printView').click(function() {
        openPrintView();
    });
}

//Function to open the print view
function openPrintView(){
    const colors = $('.colorSelect').map(function() { return $(this).val(); }).get();
    const coordinates = colors.map(function(color, index) {
        return window.gridCoordMap[color] ? window.gridCoordMap[color].join(', ') : '';
    });

    const params = {
        rowsCols: $('#rowsCols').val(),
        numColors: $('#numColors').val(),
        selectedColors: colors.join('|'),
        coordinates: coordinates.join('|')  
    };
    const queryString = $.param(params);
    window.open(`printView.php?${queryString}`, '_blank');
}