$('#my-select-element').selectize({
    // Tell Selectize to use a remote data source for the autosuggest options
    load: function(query, callback) {
        // Load options via AJAX
        $.ajax({
            // Send a GET or POST request providing "query" as the data
            // When data is retrieved, execute callback() on that data to
            // refresh the list of autosuggest options
        })
    }
});