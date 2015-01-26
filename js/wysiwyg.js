function iFrameOn(){

richTextField.document.designMode = 'On';



}



function iBlod(){

richTextField.document.execCommand('bold',false,null);



}

function iUnderline(){

richTextField.document.execCommand('underline',false,null);



}

function iItalic(){

richTextField.document.execCommand('italic',false,null);



}

function iFrontSize(){

var size = prompt("Enter a size 1-7 ",'');

richTextField.document.execCommand('FrontSize',false,size);



}

function iForeColor(){

var color = prompt('Define a basic color or apply a hexadecimal colorcode for advance color:','');

richTextField.document.execCommand('ForeColor',false,color);



}

function iHorizontalRule(){



richTextField.document.execCommand('inserthorizontalrule',false,null);



}

function iUnorderedList(){

richTextField.document.execCommand('InsertOrderedList',false,"newOL");



}

function iOrderedList(){

richTextField.document.execCommand('InsertUnorderedList',false,"newUL");



}

function iLink(){

var linkURL = prompt("Enter the url for this link :","http://");

richTextField.document.execCommand('CreateLink',false,linkURL);



}

function iUnLink(){

richTextField.document.execCommand('Unlink',false,null);



}



function submit_form(){

		var  theFrom = document.getElementById("myform");

		theFrom.elements["postCont"].value = window.frames['richTextField'].document.body.innerHTML;

		theFrom.submit();



}
