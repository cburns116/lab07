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
					"<a href='" + link + "'>" + name + "</a><div>" + desc + "</div>"
				);
            });
			
			$xml.find('lab').each(function () {
                var $this = $(this),
                    name = $this.find('assignment').text(),
                    link = $this.find('solution').text(),
                    desc = $this.find('description').text();
                $("#displaydata").append(
                    "<a href='" + link + "'>" + name + "</a><div>" + desc + "</div>"
            );
            });
        }
    });
});