
// 'persistent: false' in this manifest-file makes
// it so that the script is only loaded into memory when used
// more info: https://developer.chrome.com/extensions/event_pages

function miningChanged(event){
  if(event.newValue == "on"){
    //mining turned on actions

  }else if(event.newValue == "off"){
      // mining turned off actions


  }
}


$(window).on('storage', function({originalEvent}){
  // localStorage event attributes are found in event.originalEvent
  var event = originalEvent;

    if(event.key == "mining"){
      miningChanged(event);
    }


});


// do only when extension is installed/updated
// https://developer.chrome.com/extensions/runtime#event-onInstalled


// write context menu in manifest.json to store the settings
// more info: https://developer.chrome.com/extensions/contextMenus


// for when the browser closes/crashes (from event_pages):
/*
Listen to the runtime.onSuspend event if you need to do last second cleanup before your event page is shut down. However, we recommend persisting periodically instead. That way if your extension crashes without receiving onSuspend, no data will typically be lost.
*/
// more info: https://developer.chrome.com/extensions/runtime#event-onSuspend
