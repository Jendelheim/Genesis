
$(document).ready(function(){
      $("input[name='view']").change(radioValueChanged);

})
function radioValueChanged(){
  let radioVal = $(this.val);

  alert(radioVal);

  if($(this).is(":checked") && radioVal == 0){
    startMining();
  }
}


;


function startMining(){

  console.log("MINING STARTED");

}
