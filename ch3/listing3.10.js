// Define an instance of error themed notifications
var myErrorNotification = humane.spawn({ addnCls: 'humane-jackedup-error',
  timeout: 3000 });

// Define an instance of success themed notifications
var mySuccessNotification = humane.spawn({ addnCls: 'humane-jackedup-success'});

// Define an instance of info themed notifications
var myInfoNotification = humane.spawn({ addnCls: 'humane-jackedup-info', timeout: 4000 });

// Show notifications one after another
myErrorNotification('Error Themed Notifier');
mySuccessNotification('Success Themed Notifier');
myInfoNotification('Info Themed Notifier');

mySuccessNotification('Another Success Themed Notifier');
myErrorNotification('Wow! One more Error Themed Notifier');
