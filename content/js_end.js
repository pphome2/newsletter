<script>

// for docs

function buttonactivate(check,butt){
	if (check.checked){
		butt.disabled=false;
	} else {
		butt.disabled=true;
	}
}


function cardopenclose(th){
	if (th.style.display=='none'){
		th.style.display='block';
	} else {
		th.style.display='none';
	}
}


//Tab function for administration

function opentab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    //document.getElementById(tabName).className += " active";
    evt.currentTarget.className += " active";
}


// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();


// filter table

function tfilter(inname,ind) {
  var input, sfilter, table, tr, td, i;
  input = document.getElementById(inname);
  sfilter = input.value.toUpperCase();
  table = document.getElementById("tasktable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[ind];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(sfilter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


// go to top icon function

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("gototop").style.display = "block";
    } else {
        document.getElementById("gototop").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}


</script>
