var fieldId = 0;
var counter = 0;

function addIngredient(str){

	fieldId++;
	counter++;
	document.getElementById('counter').value = counter;
	var newElement = document.createElement('div');
	newElement.innerHTML = '<table id="ing'+ fieldId + '">' + 
        '<tr><td>Ingredient</td>' +
		'<td><input type="text" name="ingredient[]" maxlength="15" size="15"></td>' +
            '<select name="ing[]">' +
                '<option value="">Select Ingredient</option>' + str +
            '</select>' + 
        '<td>Quantity</td>' +
		'<td>' +
			'<select name="quantityLg[]">' +
				'<option value="">Select Unit</option>' +
				'<option value="0">0</option>' +
				'<option value="1">1</option>' +
				'<option value="2">2</option>' +
				'<option value="3">3</option>' +
				'<option value="4">4</option>' +
				'<option value="5">5</option>' +
				'<option value="6">6</option>' +
				'<option value="7">7</option>' +
				'<option value="8">8</option>' +
				'<option value="9">9</option>' +
				'<option value="10">10</option>' +
			'</select>' +
			'<select name="quantitySm[]">' +
				'<option value="">Select Unit</option>' +
				'<option value="1/16|0.0625">1/16</option>' +
				'<option value="1/8|0.125">1/8</option>' +
				'<option value="1/4|0.25">1/4</option>' +
				'<option value="1/3|0.33">1/3</option>' +
				'<option value="1/2|0.5">1/2</option>' +
				'<option value="2/3|0.66">2/3</option>' +
				'<option value="3/4|0.75">3/4</option>' +
			'</select>' +
		'</td>' +		
		'<td>Unit</td>' +
		'<td>' +
            '<select name="unit[]">' +
                '<option value="">Select Unit</option>' +
                '<optgroup label="Volume">' +
                    '<option value="tsp|0.16">tsp</option>' +
                    '<option value="tbl|0.5">Tbsp</option>' +
                    '<option value="fl oz|1">fl oz</option>' +
                    '<option value="cup|8">c</option>' +
                    '<option value="pt|16">pt</option>' +
                    '<option value="gal|128">gal</option>' +
                '</optgroup>' +
                '<optgroup label="Mass and Weight">' +
                    '<option value="lb">lb|16</option>' +
                    '<option value="oz">oz|1</option>' +
                '</optgroup>' +
                '<optgroup label="Misc.">' +
                    '<option value="tt">TT|null</option>' +
                    '<option value="an">AS|null</option>' +
                '</optgroup>' +
            '</select>' +   
        '</td>' +		
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
