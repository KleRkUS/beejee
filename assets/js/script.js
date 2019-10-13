const sorters = document.getElementsByName('table-sort');

window.onload = function() {

	for (sorter of sorters) {
		sorter.onclick = function() {
			sortTable(this.getAttribute('sort-type'));
		}
	}

}

function sortTable(type) {

	console.log(type);

	const xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
     		location.replace('/');
     		console.log(this.responseText);
    	}
  	};
  	xhttp.open("POST", "/main/changeorder?"+type, true);
  	xhttp.send();

}