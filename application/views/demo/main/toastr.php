<div class="container">
  <div class="row col-lg-10 col-lg-push-1">
    <h1>toastr</h1>
    <div class="well row">
      <div class="row">
        <div class="row col-lg-3">
          <div class="control-group">
            <div class="controls">
              <label class="control-label" for="title">Title</label>
              <input id="title" type="text" class="input-large form-control" placeholder="Enter a title ..." />
              <label class="control-label" for="message">Message</label>
              <textarea class="input-large form-control" id="message" rows="3" placeholder="Enter a message ..."></textarea>
            </div>
          </div>
          <div class="checkbox">
            <div class="controls">
              <label class="checkbox" for="closeButton">
                <input id="closeButton" type="checkbox" value="checked" class="input-mini" />Close Button
              </label>
            </div>
            <div class="controls">
              <label class="checkbox" for="addBehaviorOnToastClick">
                <input id="addBehaviorOnToastClick" type="checkbox" value="checked" class="input-mini" />Add behavior on toast click
              </label>
            </div>
            <div class="controls">
              <label class="checkbox" for="debugInfo">
                <input id="debugInfo" type="checkbox" value="checked" class="input-mini" />Debug
              </label>
            </div>
            <div class="controls">
              <label class="checkbox" for="progressBar">
                <input id="progressBar" type="checkbox" value="checked" class="input-mini" />Progress Bar
              </label>
            </div>
            <div class="controls">
              <label class="checkbox" for="preventDuplicates">
                <input id="preventDuplicates" type="checkbox" value="checked" class="input-mini" />Prevent Duplicates
              </label>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="control-group" id="toastTypeGroup">
            <label>Toast Type</label>
            <div class="radio">
              <label class="radio">
                <input type="radio" name="toasts" value="success" checked />Success
              </label>
              <label class="radio">
                <input type="radio" name="toasts" value="info" />Info
              </label>
              <label class="radio">
                <input type="radio" name="toasts" value="warning" />Warning
              </label>
              <label class="radio">
                <input type="radio" name="toasts" value="error" />Error
              </label>
            </div>
          </div>
          <label>Position</label>
          <div class="control-group" id="positionGroup">
            <div class="radio">
              <label class="radio">
                <input type="radio" name="positions" value="toast-top-right" checked />Top Right
              </label>
              <label class="radio">
                <input type="radio" name="positions" value="toast-bottom-right" />Bottom Right
              </label>
              <label class="radio">
                <input type="radio" name="positions" value="toast-bottom-left" />Bottom Left
              </label>
              <label class="radio">
                <input type="radio" name="positions" value="toast-top-left" />Top Left
              </label>
              <label class="radio">
                <input type="radio" name="positions" value="toast-top-full-width" />Top Full Width
              </label>
              <label class="radio">
                <input type="radio" name="positions" value="toast-bottom-full-width" />Bottom Full Width
              </label>
              <label class="radio">
                <input type="radio" name="positions" value="toast-top-center" />Top Center
              </label>
              <label class="radio">
                <input type="radio" name="positions" value="toast-bottom-center" />Bottom Center
              </label>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="control-group">
            <div class="controls">
              <label class="control-label" for="showEasing">Show Easing</label>
              <input id="showEasing" type="text" placeholder="swing, linear" class="input-mini form-control" value="swing" />

              <label class="control-label" for="hideEasing">Hide Easing</label>
              <input id="hideEasing" type="text" placeholder="swing, linear" class="input-mini form-control" value="linear" />

              <label class="control-label" for="showMethod">Show Method</label>
              <input id="showMethod" type="text" placeholder="show, fadeIn, slideDown" class="input-mini form-control" value="fadeIn" />

              <label class="control-label" for="hideMethod">Hide Method</label>
              <input id="hideMethod" type="text" placeholder="hide, fadeOut, slideUp" class="input-mini form-control" value="fadeOut" />
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="control-group">
            <div class="controls">
              <label class="control-label" for="showDuration">Show Duration</label>
              <input id="showDuration" type="text" placeholder="ms" class="input-mini form-control" value="300" />

              <label class="control-label" for="hideDuration">Hide Duration</label>
              <input id="hideDuration" type="text" placeholder="ms" class="input-mini form-control" value="1000" />

              <label class="control-label" for="timeOut">Time out</label>
              <input id="timeOut" type="text" placeholder="ms" class="input-mini form-control" value="5000" />

              <label class="control-label" for="extendedTimeOut">Extended time out</label>
              <input id="extendedTimeOut" type="text" placeholder="ms" class="input-mini form-control" value="1000" />
            </div>
          </div>
        </div>
      </div>

      <div class="row col-lg-10">
        <button type="button" class="btn btn-primary" id="showtoast">Show Toast</button>
        <button type="button" class="btn btn-danger" id="cleartoasts">Clear Toasts</button>
        <button type="button" class="btn btn-danger" id="clearlasttoast">Clear Last Toast</button>
      </div>

      <div class="row col-lg-12" style='margin-top: 25px;'>
        <pre id='toastrOptions'></pre>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(function () {
      var i = -1;
      var toastCount = 0;
      var $toastlast;

      var getMessage = function () {
        var msgs = ['My name is Inigo Montoya. You killed my father. Prepare to die!',
          '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>',
          'Are you the six fingered man?',
          'Inconceivable!',
          'I do not think that means what you think it means.',
          'Have fun storming the castle!'
        ];
        i++;
        if (i === msgs.length) {
          i = 0;
        }

        return msgs[i];
      };
      $('#showtoast').click(function () {
        var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
        var msg = $('#message').val();
        var title = $('#title').val() || '';
        var $showDuration = $('#showDuration');
        var $hideDuration = $('#hideDuration');
        var $timeOut = $('#timeOut');
        var $extendedTimeOut = $('#extendedTimeOut');
        var $showEasing = $('#showEasing');
        var $hideEasing = $('#hideEasing');
        var $showMethod = $('#showMethod');
        var $hideMethod = $('#hideMethod');
        var toastIndex = toastCount++;

        toastr.options = {
          closeButton: $('#closeButton').prop('checked'),
          debug: $('#debugInfo').prop('checked'),
          progressBar: $('#progressBar').prop('checked'),
          positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
          preventDuplicates: $('#preventDuplicates').prop('checked'),
          onclick: null
        };

        if ($('#addBehaviorOnToastClick').prop('checked')) {
          toastr.options.onclick = function () {
            alert('You can perform some custom action after a toast goes away');
          };
        }

        if ($showDuration.val().length) {
          toastr.options.showDuration = $showDuration.val();
        }

        if ($hideDuration.val().length) {
          toastr.options.hideDuration = $hideDuration.val();
        }

        if ($timeOut.val().length) {
          toastr.options.timeOut = $timeOut.val();
        }

        if ($extendedTimeOut.val().length) {
          toastr.options.extendedTimeOut = $extendedTimeOut.val();
        }

        if ($showEasing.val().length) {
          toastr.options.showEasing = $showEasing.val();
        }

        if ($hideEasing.val().length) {
          toastr.options.hideEasing = $hideEasing.val();
        }

        if ($showMethod.val().length) {
          toastr.options.showMethod = $showMethod.val();
        }

        if ($hideMethod.val().length) {
          toastr.options.hideMethod = $hideMethod.val();
        }



        if (!msg) {
          msg = getMessage();
        }

        $("#toastrOptions").text("Command: toastr["
                + shortCutFunction
                + "](\""
                + msg
                + (title ? "\", \"" + title : '')
                + "\")\n\ntoastr.options = "
                + JSON.stringify(toastr.options, null, 2)
                );

        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
        if ($toast.find('#okBtn').length) {
          $toast.delegate('#okBtn', 'click', function () {
            alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
            $toast.remove();
          });
        }
        if ($toast.find('#surpriseBtn').length) {
          $toast.delegate('#surpriseBtn', 'click', function () {
            alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
          });
        }
      });
      function getLastToast() {
        return $toastlast;
      }
      $('#clearlasttoast').click(function () {
        toastr.clear(getLastToast());
      });
      $('#cleartoasts').click(function () {
        toastr.clear();
      });
    })
  </script>
</div>
<?php footer('Jose Wilson Capera Castaño - josewilsoncc@hotmail.com'); ?>