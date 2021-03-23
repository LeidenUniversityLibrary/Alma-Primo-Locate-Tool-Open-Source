# Introduction

The Alma-Primo Locate Tool (APLT) is an open-source web application that uses the **Alma API** and **Alma** to display a button in **Primo**. The button links to pages that help patrons find items around your Library building(s) and rooms.  

Let's see it in action:
![Alma-Primo Locate Tool in action!](/assets/img/APLT.gif)

In this example a user wanted to loan a book from our Special Collections, but it turns out that the book cannot be loaned. It can only consulted in the library!  

**But where in the library? How do I get there? When is the building open? What floor? Help!**

The Alma-Primo Locate Tools aims to answer these questions and help your patrons *locate* the books.  

It integrates with your Alma and Primo installations and displays a "Locate" button next to Alma Locations you choose. The "locate" button leads to APLT which then displays related useful information.

## Features

* An **admin panel** to create, update, and delete buildings and locations.
* An **alert system**, to inform your users about important events/changes at your library.
* **Mobile first design**: Looks great on mobile since if you need to find a book on a shelf, chances are you are not sitting behind your desk.
* **Google Maps integration**: display a handy map to get to the right building.
* Possibility to upload maps of your Locations![^1]
* Flexible development environment: built using Laravel Framework.
* Open-source.
* Easy installation.
* Clear documentation.

## Live example at Leiden University Libraries

This book has been activated in Alma, and displays a link to our implementation of the Alma-Primo Locate Tool:

<https://catalogue.leidenuniv.nl/permalink/f/6jdn1r/UBL_ALMA21167033900002711>  
>The scriptorium and library at Monte Cassino, 1058-1105  
>Newton, Francis , 1928-  
>Cambridge [etc.] : Cambridge University Press  
>1999  

On the Catalogue page there is a button with a link to our APLT:  
<https://finder.library.universiteitleiden.nl/find/BSZ4>

## GitHub Repository

Interested in taking APLT for a spin? You can download the source code and follow the rest of the documentation to get started.

[^1]: Currently in beta. This feature will be reworked in a later release.
