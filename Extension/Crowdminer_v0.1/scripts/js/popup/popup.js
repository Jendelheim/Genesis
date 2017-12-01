
$(document).ready(function(){

      // init
      localStorage.setItem("mining", "off");



      //listen to the checkbox (Mining: on/off)
        $('input[type=checkbox]').change(function(){

            if(localStorage.mining == "on"){
                localStorage.setItem("mining", "off");
            }else{
                localStorage.setItem("mining", "on");
            }


        });

      // listen to the sliders
      $('.slider.round').change(function(event){
        // the new value that the user set for the slider
        // alternatively: event.originalEvent.srcElement.value
        var newVal = event.target.value;

        // implement function in scripts/js/dSliders.js

        // STORAGE SETUP:
        // https://developer.chrome.com/extensions/manifest/storage

      });
});
