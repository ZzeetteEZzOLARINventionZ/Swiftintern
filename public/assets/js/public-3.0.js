(function (window, Model) {
    window.request = Model.initialize();
    window.opts = {};
}(window, window.Model));

$(".chosen").chosen({
    no_results_text: "Oops, nothing found!",
    width: "95%"
});

$(document).ready(function () {
    $('#new_category li').click(function (e) {
        window.opts.query = $(this).children('span').html();
        window.opts.page = '1';
        $('#results').html('');
        $('#results').html('<p id="loader" class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i></p>');
        loadOpportunities(opts);
        $('#loader').html('');
    });
    
    $('#search_opportunities').submit(function (e) {
        e.preventDefault();
        window.opts = {};
        var data = $(this).serializeArray();
        $.each(data, function() {
            if (window.opts[this.name] !== undefined) {
                if (!window.opts[this.name].push) {
                    window.opts[this.name] = [window.opts[this.name]];
                }
                window.opts[this.name].push(this.value || '');
            } else {
                window.opts[this.name] = this.value || '';
            }
        });
        $('#results').html('');
        $('#results').html('<p id="loader" class="text-center"><i class="fa fa-spinner fa-spin fa-5x"></i></p>');
        loadOpportunities(window.opts);
        $('#loader').html('');
    });
    
    $('#load_opportunities').click(function (e) {
        $(this).html('<i class="fa fa-spinner fa-spin"></i> Loading');
        loadOpportunities(window.opts);
        $(this).html('Load More');
    });
    
    setInterval(loadSponsored({
        limit: 3
    }), 5000);
});

function loadOpportunities(opts) {
    console.log(opts);
    request.read({
        action: "home/index",
        data: opts,
        callback: function (data) {
            if (data.count > 1) {
                $.each(data.opportunities, function (i, opportunity) {
                    $('#results').append('<tr><td><div class="media"><a class="pull-left hidden-xs" href="' + encodeURI(opportunity._title) + '/' + opportunity._id + '"><img src="http://assets.swiftintern.com/uploads/images/sml_7921790.jpg" class="media-object small_image" alt="' + opportunity._title + '"></a><div class="media-body"><h4 class="media-heading"><a href="' + encodeURI(opportunity._title) + '/' + opportunity._id + '">' + opportunity._title + '</a></h4>' + opportunity._eligibility + '</div></div></td><td class="job-location"><p><i class="fa fa-calendar fa-fw"></i>' + opportunity._last_date + '</p><p><i class="fa fa-map-marker"></i>' + opportunity._location + '</p></td></tr>');
                });
            } else {
                $('#results').append("No Results Found, Check later");
            }
        }
    });
    
}

function loadSponsored(opts) {
    request.read({
        action: "opportunities/sponsored",
        data: opts,
        callback: function (data) {
            $.each(data.sponsoreds, function (i, opportunity) {
                $('#results').prepend('<tr class="featured"><td><div class="media"><a class="pull-left hidden-xs" href="' + encodeURI(opportunity._title) + '/' + opportunity._id + '"><img src="http://assets.swiftintern.com/uploads/images/sml_7921790.jpg" class="media-object small_image" alt="' + opportunity._title + '"></a><div class="media-body"><h4 class="media-heading"><a href="' + encodeURI(opportunity._title) + '/' + opportunity._id + '">' + opportunity._title + '</a></h4>' + opportunity._eligibility + '</div></div></td><td class="job-location"><p><i class="fa fa-calendar fa-fw"></i>' + opportunity._last_date + '</p><p><i class="fa fa-map-marker"></i>' + opportunity._location + '</p></td></tr>');
            });
        }
    });
}