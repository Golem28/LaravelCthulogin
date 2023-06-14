$(document).ready(function() {
    $('#kuerzel').on('input', function() {
        var searchTerm = $(this).val();

        $.ajax({
            url: "/forum/find",
            type: "GET",
            data: {
                forum_kuerzel: searchTerm
            },
            success: function(response) {
                var resultsList = $('#resultsList');
                resultsList.empty();

                if (response.length > 0) {
                    response.forEach(function(entry) {
                        resultsList.append('<li>' + entry.name + '</li>');
                    });
                } else {
                    resultsList.append('<li>No results found</li>');
                }
            }
        });
    });
});