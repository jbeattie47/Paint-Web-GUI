//Function to check that new color selection is not already present
function enforceUniqueColors() {
    $('.colorSelect').on('change', function() {
        var colorIsPresent = false;
        var selectedDropdown = $(this);
        var currentSelection = $(this).val();
        var previousSelection = $(this).attr('data-prev');

        $('.colorSelect').not(this).each(function() {
            if ($(this).val() === currentSelection) {
                alert("Each color must be unique. Reverting to previous selection.");
                selectedDropdown.val(previousSelection);
                colorIsPresent = true;
                return false;
            }
        });
        //If the new color is not present, update the color table
        if(!colorIsPresent){
            selectedDropdown.attr('data-prev', currentSelection);
            updateColorTable(previousSelection, currentSelection);
        }
    });
}

//Function to add cell color
function addCellClickListeners() {
    $('.colorTable').on('click', 'td', function() {
        var col = $(this).index();
        var row = $(this).parent().index();
        if(!col > 0 || !row > 0) return;

        var coord = String.fromCharCode('A'.charCodeAt(0) + (col-1)) + row;//Converts column # to letter
        var colorIndex = $('input[name=radioSelect]:checked').closest('tr').index()-1;
        var color = $('.colorSelect').eq(colorIndex).val();
        
        $(this).css('background-color', color);
        //Removes a cells coordinates if its assigned color changes to a different row in the color selection table
        Object.keys(window.gridCoordMap).forEach(function(color){
            var cell = window.gridCoordMap[color].indexOf(coord);
            if(cell !== -1) window.gridCoordMap[color].splice(cell, 1);
        });
        //Updates the gridCoordMap which holds the color of each cell on the color grid table
        window.gridCoordMap[color] = window.gridCoordMap[color] || [];
        //If the color is not already in the gridCoordMap, add it in and sort the array
        if(!window.gridCoordMap[color].includes(coord)){
            window.gridCoordMap[color].push(coord);
            sortCoords(window.gridCoordMap[color]);
        }
        updateCoordinateTracker();
    });
}

function updateCoordinateTracker(){
    $('.colorSelect').each(function(){
        var color = $(this).val();
        var coords = window.gridCoordMap[color] || [];
        $(this).closest('tr').find('.coords').text(coords.join(', '));
    });
}