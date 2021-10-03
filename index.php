
<!DOCTYPE html>
<html>
  <head>
  <Center>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>WInrate Calculator</title>
  </head>
  <body onload="">
    <h1>Must Relog Into RbxFlip</h1>
<p class="heading">RbxFlipWinrateCalculator.</p>
<section>
  <label><input type="radio" name="api" value="sync"> Use older, synchronous API</label><br/>
  <label><input type="radio" name="api" value="async" checked> Use newer, asynchronous API</label>
</section>
<section>
  <h2>Enter Username Below</h2>
  <p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <textarea class="js-cuttextarea" id="wrap"  name="input"></textarea>
  </p>

  <p>
    <input type="Submit" class="js-textareacutbtn" value="Clear"></input>
    <input type="Submit" class="js-textareapastebtn" onclick="calc()" name="calc" value="Calculate"></input></button>
    </form>
  </p>
</section>

<section>
  <h2>Contact me on bugs</h2>
  <p>Email me at <a class="js-emaillink" href="mailto:matt@example.co.uk">matt@example.co.uk</a></p>
  <p>
    <button class="js-emailcopybtn">Copy Email Address</button>
  </p>
</section>

<p id="logTarget"></p>

<p><small>Demo based on <a href="https://googlechrome.github.io/samples/cut-and-copy/index.html" target="_blank" rel="noopener">Google Chrome examples</a>.</small></p>

    <script src="script.js"></script>
  </body>
</html>
<style>
body {
  font-family: Verdana, sans-serif;
}
  </style>
  