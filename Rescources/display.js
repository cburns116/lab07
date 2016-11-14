$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "Rescources/display.xml",
        dataType: "xml",
        success: function (xml) {
			// Parse the xml file and get data
            var $xml = $(xml);
            
			console.log($xml);
			//find each homework assignments values from xml
			$xml.find('homework').each(function () {
				var $this = $(this),
					name = $this.find('assignment').text(),
					link = $this.find('solution').text(),
					desc = $this.find('description').text();
                    //insert them into the display data div
                $("#displaydata").append(
					"<h3><a href='" + link + "'>" + name + "</a></h3><div><p><a href='" + link + "'title='Solution to " + name + "''>" + desc + "</a></p></div>"
				);
            });
			//find each lab assignment values from xml
			$xml.find('lab').each(function () {
                var $this = $(this),
                    name = $this.find('assignment').text(),
                    link = $this.find('solution').text(),
                    desc = $this.find('description').text();
                    //insert them into the display data div
                $("#displaydata").append(
                    "<h3><a href='" + link + "'>" + name + "</a></h3><div><p><a href='" + link + "'title='Solution to " + name + "''>" + desc + "</a></p></div>"
            );
            });
            //uses the acordion class to create the jquery ui
            $( function() {
                $( ".accordion" ).accordion();
            } );
            //by adding titles above tooltip displays them when hovering
            $( function() {
                $( document ).tooltip();
            } );
        }
    });

});


