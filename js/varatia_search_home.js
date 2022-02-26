var citytObject = {
    "Dhaka": {
        "Gulshan": ["Gulshan-1", "Gulshan-2", "Gulshan-3"],
        "Banani": ["Banani-1", "Banani-2", "Banani-3", "Banani-4"],
        "Uttara": ["Sector-1", "Sector-2", "Sector-3", "Sector-4"]    
    },
    "Chattogram": {
        "Khulshi": ["South Khulshi", "North Khulshi"],
        "Patenga": ["South Patenga", "North Patenga"]
    }
}

window.onload = function() {
    var citySel = document.getElementById("city");
    var locationSel = document.getElementById("location");
    var sectorSel = document.getElementById("sector");

    for (var x in citytObject) {
        citySel.options[citySel.options.length] = new Option(x, x);
    }

    citySel.onchange = function() {
         //empty Sectors- and Topics- location
        sectorSel.length = 1;
        locationSel.length = 1;
        //display correct values
        for (var y in citytObject[this.value]) {
            locationSel.options[locationSel.options.length] = new Option(y, y);
        }
    }
    
    locationSel.onchange = function() {
        //empty Sector dropdown
         sectorSel.length = 1;
        //display correct values
        var z = citytObject[citySel.value][this.value];

        for (var i = 0; i < z.length; i++) {
            sectorSel.options[sectorSel.options.length] = new Option(z[i], z[i]);
        }
    }
}