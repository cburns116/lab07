$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "Rescources/display.xml",
        dataType: "xml",
        success: function (xml) {
			// Parse the xml file and get data
            var $xml = $(xml);
            
			console.log($xml);
			
			$xml.find('homework').each(function () {
				var $this = $(this),
					name = $this.find('assignment').text(),
					link = $this.find('solution').text(),
					desc = $this.find('description').text();
                $("#displaydata").append(
					"<h3><a href='" + link + "'>" + name + "</a></h3><div><p><a href='" + link + "'title='Solution to " + name + "''>" + desc + "</a></p></div>"
				);
            });
			
			$xml.find('lab').each(function () {
                var $this = $(this),
                    name = $this.find('assignment').text(),
                    link = $this.find('solution').text(),
                    desc = $this.find('description').text();
                $("#displaydata").append(
                    "<h3><a href='" + link + "'>" + name + "</a></h3><div><p><a href='" + link + "'title='Solution to " + name + "''>" + desc + "</a></p></div>"
            );
            });

            $( function() {
                $( ".accordion" ).accordion();
            } );
            $( function() {
                $( document ).tooltip();
            } );
        }
    });

});


