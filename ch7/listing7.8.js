$('#my-select-element').selectize({
        ...
    onChange: function(value) {
        // Do something when input changes
        alert(value);
    }
});