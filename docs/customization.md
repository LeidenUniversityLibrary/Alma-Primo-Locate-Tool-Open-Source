# Customization

## Buildings, Locations, Alerts

The Alma-Primo Locate Tool allows you to create *Buildings*, *Locations*, and *alerts*:

- Buildings are *not* linked to Alma, and can be freely created. One Building can contain multiple locations.
- Locations are the Alma Locations. Alma Locations are contained in the Alma Libraries.
- Alerts are application-wide, and will display on all the public-facing pages.

## Buildings

Buildings are the physical place where your items are kept. You can create an infinite number of buildings.

- Building name
- Building ID code
- Country
- City
- Postcode
- Street
- Number
- Opening Hours (optional)
- Google Maps (optional)
- Additional Information (optional)
- Additional Link (optional)
- Additional Link Text (optional)

### Building ID code

The Building ID code is a code that will be used by the app to identify a building. You can use any code you desire, but it must be unique and not longer than 5 letters.

### Opening Hours

The Opening Hours field allows you to insert a URL that should link to information about opening hours. In a future release it will integrate with the Alma API and allows display the opening hours added to Alma.

### Google Maps

You can embed Google Maps in your building. To add a Google Maps:

1. Visit Google Maps and find your building.
2. Click on the "share" button.
3. Click on "Embed a map".
4. Click on "COPY HTML".
5. Paste the code in the Google Maps field.

On Google Maps:
![Google Maps in APLT](/assets/img/gmaps.png)

In the Admin Panel:
![Google Maps in APLT](/assets/img/gmaps2.png)

## Locations

To create a new Location, go to the admin panel, then to the Locations menu, and click on Create a new Location.

Tha application will query the Alma API and return a list the list of Alma Libraries defined in Alma. Libraries cannot be manually added to this list, they must be generated in Alma.

Once you have selected a Library, a new menu will appear with the following options:

- Alma Location
- Alma Location ID
- Override Alma Location name (optional)
- Building
- Floor
- Room name (optional)
- Additional information (optional)
- Additional link (optional)
- Additional link text (optional)
- Location Map (optional)

### Alma Location and Alma Location ID

The Alma Location dropdown queries the Alma API and returns a list of Alma Locations linked to the Alma Library you chose in the previous step.  
The Alma Location ID appears when you select an Alma Location. This is generated in Alma and it cannot be modified.

!!! Note
    In some cases you will have an Alma Library that has not Alma Locations bound to it. In that case, APLT will notify you that you must first create a Location in Alma or you will not be able to create a Location in APLT.

### Override Alma Location name

In some cases the name of a Location in Alma might not mean much to the end user. Here you can replace that name with a more useful name.

!!! Example
    An Alma Location was named "VBBFE". The acronym might not mean anything to the end-user, so in the Override Alma Location name field we could type: "Very Beautiful Books For Everyone".

### Location Map

!!! Danger
    This feature is experimental! It should work as is, but the logic and functionality needs to be optimized, or even rewritten. The chances of the current version braking in future releases is high.

You can upload an image to help your users find the right room / area in the building. We envision it as a place for maps of building, with highlighted areas indicating where to go.

### Logos

All the logos and images used by the app are kept in the `public\img` folder. The background of the homepage is found in `public\img\homepage`.

### CSS

The CSS files are found in `public\css`.

### JS

The JS files are found in `public\js`.
