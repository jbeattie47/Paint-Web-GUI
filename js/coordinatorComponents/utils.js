//Function to get the RGB value of a color
function getRGB(color){
    var tempDiv = $('<div>').css('background-color', color).appendTo('body');
    var rgb = tempDiv.css('background-color');
    tempDiv.remove();
    return rgb;
}

//Function updates the color table when a color on the color selection table is changed
function updateColorTable(previousSelection, newSelection){
    var previousRGB = getRGB(previousSelection);
    var newRGB = newSelection;
    //Update the color of the cells
    $('.colorTable td').each(function(){
        var cellRGB = getRGB($(this).css('background-color'));
        if(cellRGB === previousRGB) $(this).css('background-color', newRGB);
    });

    //Updates colorCellMap which holds the color of each cell on the color grid table
    if(colorCellMap[previousSelection]){
        //If the previous selection is in the colorCellMap, update the colorCellMap
        colorCellMap[previousSelection] = (colorCellMap[previousSelection] || []).concat(colorCellMap[newSelection]);
        delete colorCellMap[newSelection];
    }
}

//Function to create the color selection table
function createColorSelectionTable(numColors, colorOptions) {
    let table = '<table class= "colorSelectionTable"><tr><th>#</th><th>Color Selection</th></tr>';
    let defaultRadio = true;
    for (let i = 0; i < numColors; i++) {
        table += `<tr><td>${i+1}</td><td><select class='colorSelect' data-prev='${colorOptions[i]}'>`;
        colorOptions.forEach((color, index) => {
            table += `<option value="${color}"${index === i ? " selected" : ""}>${color}</option>`;
        });
        table += `<input type="radio" id="${defaultRadio ? "radioOn" : "radioOff"}" value="${colorOptions[i]}" name="radioSelect" ${defaultRadio ? "checked" : ""}/></select></td>`;
        table += `<td class='coords'></td></tr>`;//Adds column to display coordinates
        if(defaultRadio)defaultRadio = false;
    }
    table += '</table>';
    return table;
}

//Function to create the grid table
function createColorTable(rowsCols) {
    let table = '<table class="colorTable"><tr><td></td>';
    for (let i = 0; i < rowsCols; i++) {
        table += `<td>${String.fromCharCode('A'.charCodeAt(0) + i)}</td>`;
    }
    table += '</tr>';
    for (let row = 1; row <= rowsCols; row++) {
        table += `<tr><td>${row}</td>`;
        for (let col = 1; col <= rowsCols; col++) {
            table += '<td>\t</td>';
        }
        table += '</tr>';
    }
    table += '</table>';
    return table;
}
function sortCoords(coords){
    coords.sort(function(a, b){
        var val1 = a.match(/^([A-Z]+)(\d+)$/);
        var val2 = b.match(/^([A-Z]+)(\d+)$/);
        //Gets the column letters
        var colA = val1[1];
        var colB = val2[1];

        //Gets the row numbers
        var rowA = parseInt(val1[2], 10);
        var rowB = parseInt(val2[2], 10);

        if(colA === colB){
            return rowA - rowB;
        } else {
            return colA.localeCompare(colB);
        }

    });
}