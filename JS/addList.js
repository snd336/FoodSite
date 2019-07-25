var fieldId = 0;
var counter = 0;

function addIngredient(){

	
	var newElement = document.createElement('div');
	newElement.innerHTML = '<table id="ing'+ fieldId + '">' + 
		'<tr><td>Quantity</td>' +
		'<td><input type="text" name="quantity[]" maxlength="5" size="5"></td>' +
		'<td>Unit</td>' +
		'<td>' +
            '<select name="unit[]" required>' +
                '<option value="">Select Unit</option>' +
                '<optgroup label="Volume">' +
                    '<option value="tsp">tsp</option>' +
                    '<option value="tbl">Tbsp</option>' +
                    '<option value="fl oz">fl oz</option>' +
                    '<option value="c">c</option>' +
                    '<option value="pt">pt</option>' +
                    '<option value="gal">gal</option>' +
                '</optgroup>' +
                '<optgroup label="Mass and Weight">' +
                    '<option value="lb">lb</option>' +
                    '<option value="oz">oz</option>' +
                '</optgroup>' +
            '</select>' +   
        '</td>' +
		'<td>Ingredient</td>' +
		'<td><input type="text" name="ingredient[]" maxlength="15" size="15"></td>' +
		'<td>Notes</td>' +
		'<td><input type="text" name="notes[]" maxlength="20" size="20"></td>' + 
		'<td><input type="button" value="Delete Ingredient" onclick="removeInput(' + fieldId + ');"></td></tr></table>';

	document.getElementById('ingredients').appendChild(newElement);
	
}


function removeInput(num){
	counter--;	
	document.getElementById('counter').value = counter;
	var myElement = document.getElementById('ing' + num + '');
	var myParent = myElement.parentNode;
	while (myParent.hasChildNodes()){
			myParent.removeChild(myParent.firstChild);
	}
}