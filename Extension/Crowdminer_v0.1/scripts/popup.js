
function startMining(){
  localStorage.setItem("mining", "on");

  console.log("MINING STARTED");
  console.log("Mining status: " + localStorage.mining);

}

function stopMining(){
  localStorage.setItem("mining", "off");

  console.log("MINING STOPPED");
  console.log("Mining status: " + localStorage.mining);
}




$(document).ready(function(){
      console.log("turned off");


      //listen to the radiobuttons

      /*
      // problematic because it requires manipulating the value
      // of the buttons as well (if you click anywhere it will
      // run the mining script but not necessarily update the buttons)
      $('.switch input[type=radio]').click( function(){
          console.log("event handler entered");

          if(localStorage.mining == "on"){
            stopMining();
          }else{
            startMining();

          }

        }
        $('switch input[type=radio]').on('input', function(){
            alert('ayy');


        }
)});
*/
});
