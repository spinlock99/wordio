jQuery(document).ready(function() {
  var dialogOpts = {
    autoOpen: true,
    minHeight: 'auto',
    modal: true
  }
  jQuery('.dialog').dialog(dialogOpts);
  jQuery('#success').submit(function(event) {
    jQuery('.dialog').dialog('close');
  });
});
