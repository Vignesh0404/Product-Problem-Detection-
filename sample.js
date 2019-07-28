var fieldId = 0;
 
function addElement(parentId, elementTag, elementId, html){
	var id = document.getElementById(parentId);
	var newElement = document.createElement(elementTag);
	newElement.setAttribute('id', elementId);
	newElement.innerHTML = html;
	id.appendChild(newElement);
 
}
 
function removeField(elementId){
	var fieldId = "field-"+elementId;
	var element = document.getElementById(fieldId);
	element.parentNode.removeChild(element);
}
 
function addField(){
	fieldId++;
	var html = '<br /><input type="text" class="form-control" placeholder="Enter some text" name="vname">' + '<button class="btn btn-danger" onclick="removeField('+fieldId+');"><span class="glyphicon glyphicon-minus"></span></button><br />';
	addElement('forms', 'div', 'field-'+ fieldId, html);
}