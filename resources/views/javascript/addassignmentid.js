  var newdivsid = 1;
  var max = 0;
  function newassignment(){
     var newassignment = document.getElementById('new-assignmentid').innerHTML;
     var newdivs = document.createElement('div');
     newdivs.id =  newdivsid;
     newdivs.className = "idsassignments";
     newdivsid++;
     newdivs.innerHTML = newassignment;
     document.getElementById('idassignments').appendChild(newdivs);
  }
  function deleteassignment() {
     var ids = $(".idsassignments[id]").map(function() {
      return parseInt(this.id, 10);
  }).get();

  var values = $(".values[id]").map(function() {
      return parseInt(this.id, 10);
  }).get();
  newdivsid--;
  console.log(values);
  var highest = Math.max.apply(Math, ids);

  document.getElementById(highest).remove();
  }